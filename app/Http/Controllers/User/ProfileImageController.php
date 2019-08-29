<?php

namespace App\Http\Controllers\User;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileImageController extends Controller
{ 

    public function index()
    {
        //$routesType=RouteType::all();
        //return view('user.home',compact('routesType'));
    }

    public function create()
    {
       //
    }

    public function show($id)
    {
        //
    }

    public function store(Request $request)
    {
        $rules=[
         'image'=>'required|image|mimes:jpeg,jpg,png|max:4096',
        ];

        $messages = [
            'image.required'=>"La foto es obligatoria",
            'image.max'=>"La foto no debe tener mayor a 4 MB, y debe de tener una extension jpeg,jpg o png",
            'image.image'=>"La foto no debe tener un peso mayor a 4 MB, y debe de tener una extension jpeg,jpg o png",
            'image.mimes'=>"La foto no debe tener un peso mayor a 4 MB, y debe de tener una extension jpeg,jpg o png"
        ]; 

        $this->validate($request, $rules, $messages);
        $fileName = uniqid("bn_", true).".".$image->getClientOriginalExtension();
        Image::make($image)->save( public_path('img/profiles/'.$fileName));
        $img = new Banner();
        $img->company_id = new ObjectID(Auth::user()->id);
        $img->img = $fileName;
        $img->save();
    }
    
    public function edit($id)
    {
        //
    }
    
    public function update(Request $request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
