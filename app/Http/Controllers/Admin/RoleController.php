<?php

namespace App\Http\Controllers\Admin;


use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreRequest;

class RoleController extends Controller
{

    public function index()
    {
        $roles=Role::all();
        return view('admin.roles',compact('roles'));
    }

    public function create()
    {
       return view('admin.roles_create');
    }

    public function show($id)
    {
        //
    }

    public function store(RoleStoreRequest $request)
    {
        $role = new Role;
        $role->name = $request->input("name");

        //return ($role);
        $role->save();
        return redirect()->route('roles');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role-> delete();
        return redirect()->route('roles');
    }
}
