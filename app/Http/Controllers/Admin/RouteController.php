<?php

namespace App\Http\Controllers\Admin;


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
                

                if(!empty($search) && (strpos(strtolower($item->is_public ? 'true' : 'false'), strtolower($search)) !== false)){//match por estado de ruta
                    return $item;
                }

                if(!empty($search) && (strpos(strtolower($item->name), strtolower($search)) !== false)){//match nombre ruta
                    return $item;
                }
                if(!empty($search) && (strpos(strtolower($item->description), strtolower($search)) !== false)){//match descripcion
                    return $item;
                }
                if(!empty($search) && (strpos(strtolower($item->tiporuta[0]->name), strtolower($search)) !== false)){//match tiporuta
                   return $item;
                }

                if(!empty($search) && (strpos(strtolower($item->User['name']), strtolower($search)) !== false)){//match nombre usuario
                   return $item;
                }
                if(!empty($search) && (strpos(strtolower($item->User['last_name']), strtolower($search)) !== false)){//match apellido
                   return $item;
                }

                if ($search=='') {
                       return $item;
                }
            })->paginate(10);
        return view('admin.routes',compact('routes'));
    }

    public function show($id)
    {
        $routesType=RouteType::all();
        $route = Route::find($id);
        return view('admin.home',compact('route','routesType'));
    } 

    public function store(RouteStoreRequest $request)
    {
        $routes=new Route();
        $routes->user_id = new ObjectID(Auth::user()->id);
        $routes->route_type_id = new ObjectID($request->input('slc_tipo'));
        $routes->name = $request->input('nombre');
        $routes->is_public=true;
        $routes->description = $request->input('descripcion');
        $routes->coordinates = json_decode($request->get('waypoints'));         
        $routes->save();
        return redirect()->route('admin routes')->with('success', 'Ruta has been successfully added');
    }
    
    public function edit($id)
    {
        $routesType=RouteType::all();
        $routeedit = Route::find($id);
        return view('admin.home',compact('routeedit','routesType'));
    }
    
    public function update(RouteUpdateRequest $request, $id)
    {
        $routes= Route::find($id);
        $routes->route_type_id = new ObjectID($request->input('slc_tipo'));
        $routes->name = $request->input('nombre');
        $routes->description = $request->input('descripcion'); 
        $routes->coordinates = json_decode($request->get('waypointsedit'));       
        $routes->save();
        return redirect()->route('admin routes')->with('success', 'Ruta has been successfully update');
    }

    public function destroy($id)
    {
        $route = Route::find($id);
        $route->delete();
        return redirect()->route('admin routes')->with('success', 'Ruta has been successfully deleted');
    }
}