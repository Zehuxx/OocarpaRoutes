<?php

namespace App\Http\Controllers\Admin;


use App\Models\Route;
use App\Models\RouteType;
use App\Models\User;
use MongoDB\BSON\ObjectID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Http\Requests\ValidarStorePlan;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Http\Controllers\Controller;
use App\Support\Collection;

class RouteController extends Controller
{
    public function index(Request $request)
    {

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
       }))->where('deleted_at', 'exists', false);

        //return view('admin.routes',compact('routes'));
        return($routes);

    }

    public function destroy($id)
    {
        $route = Route::find($id);
        $route-> delete();
        return redirect()->route('routes')->with('success', 'Ruta has been successfully deleted');

    }
}
