<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
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
        //
    }

    public function destroy($id)
    {
        //
    }
}