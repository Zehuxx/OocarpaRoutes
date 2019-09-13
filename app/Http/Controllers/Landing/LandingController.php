<?php

namespace App\Http\Controllers\Landing;


use App\Models\Route;
use App\Models\User;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectID; 
use Illuminate\Support\Facades\Auth;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{  

    public function index(Request $request)
    {
        $search = $request->input('search');
        if (Auth::user()!=null) {
            $routes=Route::raw((function($collection) {
              return $collection->aggregate([
                [
                  '$lookup' => [
                    'from' => 'route_types',
                    'localField' => 'route_type_id',
                    'foreignField'=> '_id',
                    'as' => 'tiporuta'
                  ]
                ]
              ]);
         }))->where('deleted_at', 'exists', false)
            ->filter(function ($item) use ($search){
                $user_id= new ObjectID(Auth::user()->id);
                $id=false;$nom=false;$des=false;$tr=false;$public=false;

                if($item->user_id== $user_id){ //rutas usuario
                    $id=true;
                }

                if($item->is_public==true){ //rutas publicas
                    $public=true;
                }
                if ($public || $id) {
                    if(!empty($search) && (strpos(strtolower($item->name), strtolower($search)) !== false)){//match nombre
                        return $item;
                    }
                    if(!empty($search) && (strpos(strtolower($item->description), strtolower($search)) !== false)){//match descripcion
                        return $item;
                    }
                    if(!empty($search) && (strpos(strtolower($item->tiporuta[0]->name), strtolower($search)) !== false)){//match tiporuta
                       return $item;
                    }
                    
                }

                if ($search=='') {
                    if ($public || $id) {
                       return $item;
                    }
                }
            })->paginate(10);
        }else{
            $routes=Route::raw((function($collection) {
              return $collection->aggregate([
                [
                  '$lookup' => [
                    'from' => 'route_types',
                    'localField' => 'route_type_id',
                    'foreignField'=> '_id',
                    'as' => 'tiporuta'
                  ]
                ]
              ]);
         }))->where('deleted_at', 'exists', false)
            ->filter(function ($item) use ($search){
                $nom=false;$des=false;$tr=false;$public=false;


                if($item->is_public==true){ //rutas publicas
                    $public=true;
                }
                if ($public) {
                    if(!empty($search) && (strpos(strtolower($item->name), strtolower($search)) !== false)){//match nombre
                        return $item;
                    }
                    if(!empty($search) && (strpos(strtolower($item->description), strtolower($search)) !== false)){//match descripcion
                        return $item;
                    }
                    if(!empty($search) && (strpos(strtolower($item->tiporuta[0]->name), strtolower($search)) !== false)){//match tiporuta
                       return $item;
                    }
                    
                }

                if ($search=='') {
                    if ($public) {
                       return $item;
                    }
                }
            })->paginate(10);
        }
        //dd($routes);
        return view('landing',compact('routes'));
    }

    public function create()
    {
        
    }

    public function show($id)
    {
        //$routesType=RouteType::all();
        //$route = Route::find($id);
        //return view('user.home',compact('route','routesType'));
    } 

    public function store()
    {

    }
    
    public function edit($id)
    {
        
    }
    
    public function update( $id)
    {

    }

    public function destroy($id)
    {
        
    }
}