<?php

namespace App\Http\Controllers\Company;

use Image;
use App\Models\Banner;
use App\Models\Company_Plan as CompanyPlan;
use MongoDB\BSON\ObjectID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BannerStoreRequest;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::getBanner();
        $banners = Banner::all()->where('company_id', Auth::user()->id);
        return view('company/banner', compact('banners', 'banner'));
    }

    public function create()
    {
        $banner = Banner::getBanner();
        return view('company/banner_create', compact('banner'));
    }

    public function store(BannerStoreRequest $request)
    {
        $numBan = count(Banner::all()->where('company_id', Auth::user()->id));
        $numBanPlan = CompanyPlan::all()->where('company_id', Auth::user()->id)->sortByDesc('created_at')->first()->Plan->nbanners;

        if ($numBan < $numBanPlan && $numBanPlan != 0) { // comprueba si la cantidad de banners subidos es menor que la cantidad de banners en el plan
            $image=$request->file('banner');
            $fileName = uniqid("bn_", true).".".$image->getClientOriginalExtension();
            Image::make($image)->save( public_path('img/banners/'.$fileName));

            $img = new Banner();
            $img->company_id = new ObjectID(Auth::user()->id);
            $img->img = $fileName;
            $img->save();
        } else {
            return redirect()->route('company banner')->with('msg', 'Solo se permiten ' . $numBanPlan . ' banners en tu plan actual');
        }

        return redirect()->route('company banner');
    }

    public function show()
    {
        $banner = (Banner::all()->random(1)->first())->img;

        return view('landing', compact('banner'));
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();

        return redirect()->route('company banner');
    }
}
