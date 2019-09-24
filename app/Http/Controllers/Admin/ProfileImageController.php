<?php

namespace App\Http\Controllers\Admin;

use Image;
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
    
    }
    
    public function edit($id)
    {
        //
    }
    
    public function update(Request $request)
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

        $user_id=Auth::user()->id;
        $user=User::find($user_id);
        $image= $request->file("image");
        if ($image) {
            $fileName = uniqid("pr_", true).".".$image->getClientOriginalExtension();

            if ($user->user_img===null) {
                Image::make($image)->save( public_path('img/profiles/'.$fileName));
                $user->user_img=$fileName;
                $user->save();
            }else{
                Image::make($image)->save( public_path('img/profiles/'.$user->user_img));
            }
            return redirect()->route('admin options');
        }else{
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        //
    }
}
