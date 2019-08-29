<?php

namespace App\Http\Controllers\Company;

use Image;
use App\Models\Banner;
use MongoDB\BSON\ObjectID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BannerStoreRequest;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{ 
    public function index()
    {
        $banners = Banner::all()->where('company_id', Auth::user()->id);
        return view('company/banner', compact('banners'));
    }

    public function create()
    {
        return view('company/banner_create');
    }

    public function store(BannerStoreRequest $request)
    {
        $image=$request->file('banner');
        $fileName = uniqid("bn_", true).".".$image->getClientOriginalExtension();
        Image::make($image)->save( public_path('img/banners/'.$fileName));

        $img = new Banner();
        $img->company_id = new ObjectID(Auth::user()->id);
        $img->img = $fileName;
        $img->save();

        return $this->index();
    }

    public function show()
    {
        $banner = (Banner::all()->random(1)->first())->img;

        return view('landing', compact('banner'));
    }
}
