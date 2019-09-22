<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RouteType;
use App\Models\Company;
use App\Models\Location;
use App\Models\User;
use MongoDB\BSON\ObjectID;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Http\Controllers\Controller;
use App\Support\Collection;

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
                $routesType=RouteType::all();
                return view('admin.home')->with('routesType', $routesType);
            }elseif(Auth::user()->role_id == "5d607fa9b2d1b72ef0ec1367"){
                $routesType=RouteType::all();
                return view('user.home')->with('routesType', $routesType);
            }elseif(Auth::user()->role_id == "5d607fb2b2d1b72ef0ec1368"){
               $company=Company::where("company_id",new ObjectID(Auth::user()->id))->first();
               $locations=Location::where("company_id",new ObjectID(Auth::user()->id))->paginate(10);
               //return dd($locations);
               return view('company.home',compact('company','locations'));
            }
        }else{
            return redirect()->route("login");
        }
    }
}
