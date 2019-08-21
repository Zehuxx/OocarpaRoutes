<?php

namespace App\Http\Controllers;


use App\Models\Route;
use App\Models\RouteType;
use App\Models\User;
use MongoDB\BSON\ObjectID; 
use Illuminate\Http\Request;
use App\Http\Requests\RouteStoreRequest;

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
        $route = Route::find($id);
        return view('user.home',compact('route'));
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
        $car = Car::find($id);
        return view('caredit',compact('car','id'));
    }
    
    public function update(Request $request, $id)
    {
        $car= Car::find($id);
        $car->carcompany = $request->get('carcompany');
        $car->model = $request->get('model');
        $car->price = $request->get('price');        
        $car->save();
        return redirect('car')->with('success', 'Car has been successfully update');
    }

    public function destroy($id)
    {
        $route = Route::find($id);
        $route->delete();
        return redirect()->route('user routes')->with('success', 'Ruta has been successfully deleted');
    }
}