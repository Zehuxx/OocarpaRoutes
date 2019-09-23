<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use App\Models\RouteType;
use App\Models\Company;
use App\Models\Location;
use App\Models\Company_Plan;
use App\Models\User;
use Carbon\Carbon;
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
            $banner = Banner::getBanner();

            if(Auth::user()->role_id == "5d607f9db2d1b72ef0ec1366"){

                $routesType=RouteType::all();
                return view('admin.home', compact('routesType', 'banner'));
            }elseif(Auth::user()->role_id == "5d607fa9b2d1b72ef0ec1367"){

                $empresas=Company_Plan::where('deleted_at', 'exists', false)
                                ->get();
                $id_empresas=array();
                foreach ($empresas as $key => $value) {
                // filtra las empresas que tiene activo su plan
                        if((new Carbon($value->end_date)) < Carbon::now()){
                            $empresas->pull($key);
                         }else{
                            $id_empresas[]=$value->company_id;
                         } 
                }
                $locations=Location::whereIn('company_id',$id_empresas)
                                    ->where('deleted_at', 'exists', false)
                                    ->get();
                $routesType=RouteType::all();
                return view('user.home', compact('routesType', 'banner','locations'));
            }elseif(Auth::user()->role_id == "5d607fb2b2d1b72ef0ec1368"){
                $company=Company::where("company_id",new ObjectID(Auth::user()->id))->first();
                $locations=Location::where("company_id",new ObjectID(Auth::user()->id))->paginate(10);
                //return dd($banner);
                return view('company.home',compact('company','locations', 'banner'));
                return view('user.home',compact('routesType','locations'));
            }
        }else{
            return redirect()->route("login");
        }
    }
}
