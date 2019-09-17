<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        $users=User::paginate(10);
        return view('admin.users',compact('users'));
    }

    public function create()
    {
       //
    }

    public function show($id)
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        $user = User::find($id);
        $user-> delete();
        return redirect()->route('users')->with('success', 'Usuario has been successfully deleted');
    }
}
