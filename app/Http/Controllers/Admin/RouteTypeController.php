<?php

namespace App\Http\Controllers\Admin;


use App\Models\RouteType;
use Illuminate\Http\Request;
use App\Http\Requests\RouteTypeStoreRequest;
use App\Http\Controllers\Controller;

class RouteTypeController extends Controller
{

    public function index()
    {
        $routeTypes=RouteType::all();
        return view('admin.routeTypes',compact('routeTypes'));
    }

    public function create()
    {
        return view('admin.routeTypes_create');
    }

    public function show($id)
    {
       //
    }

    public function store(RouteTypeStoreRequest $request)
    {
        $rt = new RouteType;
        $rt->name = $request->input("name");

        //return ($rt);
        $rt->save();
        return redirect()->route('route Types');
    }

    public function edit($id)
    {
        //return view('admin.routeType_create');
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy($id)
    {
        $rt = RouteType::find($id);
        $rt-> delete();
        return redirect()->route('route Types');
    }
}
