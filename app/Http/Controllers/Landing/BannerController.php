<?php

namespace App\Http\Controllers\Landing;

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
        
    }

    public function create()
    {
       
    }

    public function store(BannerStoreRequest $request)
    {
        
    }

    public function show()
    {
        $banner = (Banner::all()->random(1)->first())->img;

        return view('landing', compact('banner'));
    }
}
