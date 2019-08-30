<?php

namespace App\Http\Controllers\User;


use App\Models\Route;
use App\Models\RouteType;
use App\Models\User;
use MongoDB\BSON\ObjectID; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RouteStoreRequest;
use App\Http\Requests\RouteUpdateRequest;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Http\Controllers\Controller;
use App\Support\Collection;


class RouteController extends Controller
{  

    public function index(Request $request)
    {
        $search = $request->input('search');
        
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
                $nombre=stristr($item->name, $search); //match nombre
                if($nombre){
                    $nom=true;
                }
                $descripcion=stristr($item->description, $search); //match descripcion
                if($descripcion){
                    $des=true;
                }
                $tipor=stristr($item->tiporuta[0]->name, $search); //match tiporuta
                if($tipor){
                    $tr=true;
                }
                if($item->is_public==true){ //rutas publicas
                    $public=true;
                }
                if ($public || $id) {
                    if ($nom || $des || $tr) {
                       return $item;
                    }
                }
                if ($search=='') {
                    if ($public || $id) {
                       return $item;
                    }
                }
            })->paginate(10);
        return view('user.routes',compact('routes'));
    }

    public function create()
    {
        return view('carcreate');
    }

    public function show($id)
    {
        $routesType=RouteType::all();
        $route = Route::find($id);
        return view('user.home',compact('route','routesType'));
    } 

    public function store(RouteStoreRequest $request)
    {
        $routes=new Route();
        $routes->user_id = new ObjectID(Auth::user()->id);
        $routes->route_type_id = new ObjectID($request->input('slc_tipo'));
        $routes->name = $request->input('nombre');
        $routes->is_public=false;
        $routes->description = $request->input('descripcion');
        $routes->coordinates = json_decode($request->get('waypoints'));         
        $routes->save();
        return redirect()->route('user routes')->with('success', 'Ruta has been successfully added');
    }
    
    public function edit($id)
    {
        $routesType=RouteType::all();
        $routeedit = Route::find($id);
        return view('user.home',compact('routeedit','routesType'));
    }
    
    public function update(RouteUpdateRequest $request, $id)
    {
        $routes= Route::find($id);
        $routes->route_type_id = new ObjectID($request->input('slc_tipo'));
        $routes->name = $request->input('nombre');
        $routes->description = $request->input('descripcion'); 
        $routes->coordinates = json_decode($request->get('waypointsedit'));       
        $routes->save();
        return redirect()->route('user routes')->with('success', 'Ruta has been successfully update');
    }

    public function destroy($id)
    {
        $route = Route::find($id);
        $route->delete();
        return redirect()->route('user routes')->with('success', 'Ruta has been successfully deleted');
    }
}