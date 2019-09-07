<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RouteType;
use App\Models\Company;
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
                return view('admin.home');
            }elseif(Auth::user()->role_id == "5d607fa9b2d1b72ef0ec1367"){
                $routesType=RouteType::all();
                return view('user.home')->with('routesType', $routesType);
            }elseif(Auth::user()->role_id == "5d607fb2b2d1b72ef0ec1368"){
                //$company = Company::all()->where('user_id', Auth::user()->id);
                //$company = array_pop($company['items']);
                //$user = Company::find($company->id)->User;

               $companies=Company::raw((function($collection) {
                return $collection->aggregate([
                    [
                        '$lookup' => [
                        'from' => 'users',
                        'localField' => 'user_id',
                        'foreignField'=> '_id',
                        'as' => 'usuario'
                        ]
                    ]
                    ]);
                }));

                /*foreach ($companies as $e) {
                    //if($company->usuario->_id->oid == Auth::user()->id)
                    return($e);
                }*/
                //unset($e);
                for ($i=0; $i < count($companies) ; $i++) {
                    if(count($companies[$i]->usuario)>0){
                        if($companies[$i]->usuario[0]->_id == Auth::user()->id){
                            return view('company.home',["company"=>$companies[$i]]);
                        }
                    }
                }
               //return($companies);
               //return view('company.home',;

            }
        }else{
            return redirect()->route("login");
        }
    }
}
