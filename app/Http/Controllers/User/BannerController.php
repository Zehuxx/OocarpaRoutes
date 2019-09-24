<?php

namespace App\Http\Controllers\User;

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
        
        $banner = (Banner::all()->random(1)->first())->img;

        return view('user.options', compact('banner'));
    }

    public function create()
    {
        
    }

    public function store(BannerStoreRequest $request)
    {
        
    }

    public function show()
    {
        
    }

    public function destroy($id)
    {
        
    }
}
