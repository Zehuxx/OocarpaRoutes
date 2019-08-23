<?php

namespace App\Http\Controllers;


use App\Models\Route;
use App\Models\RouteType;
use App\Models\User;
use MongoDB\BSON\ObjectID; 
use Illuminate\Http\Request;
use App\Http\Requests\RouteStoreRequest;
use App\Http\Requests\RouteUpdateRequest;

class RouteController extends Controller
{ 

    public function index()
    {
        $routes=Route::all();
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
        $routes->user_id = new ObjectID("5d56f8d0189dda3588cc7cfd");
        $routes->route_type_id = new ObjectID($request->input('slc_tipo'));
        $routes->name = $request->input('nombre');
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