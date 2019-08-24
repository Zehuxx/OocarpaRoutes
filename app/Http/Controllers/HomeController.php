<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RouteType;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
    
    public function __construct()
    {
        $this->middleware('auth');
    }  */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()!=null) {
            if(Auth::user()->role_id == "5d607f9db2d1b72ef0ec1366"){
                return view('admin.home');
            }elseif(Auth::user()->role_id == "5d607fa9b2d1b72ef0ec1367"){
                $routesType=RouteType::all();
                return view('user.home')->with('routesType', $routesType);
            }elseif(Auth::user()->role_id == "5d607fb2b2d1b72ef0ec1368"){
                return view('company.home');
            }
        }else{
            return redirect()->route("login");
        }
    }
}
