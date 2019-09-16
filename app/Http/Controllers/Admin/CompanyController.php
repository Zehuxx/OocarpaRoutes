<?php

namespace App\Http\Controllers\Admin;


use App\Models\Company;
use App\Models\User;
use MongoDB\BSON\ObjectID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Http\Requests\ValidarStoreRT;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Http\Controllers\Controller;
use App\Support\Collection;

class CompanyController extends Controller
{

    public function index()
    {
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
       }))->paginate(10);

       return view('admin.companies',compact('companies'));
    }

    public function create()
    {
        //return view('admin.routeTypes_create');
    }

    public function show($id)
    {
       //
    }

    public function store(ValidarStoreRT $request)
    {
        //$rt = new RouteType;
        //$rt->name = $request->input("name");

        //return ($rt);
        //$rt->save();
        //return redirect()->route('route Types');
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
        $company = Company::find($id);
        $company-> delete();
        return redirect()->route('companies')->with('success', 'Empresa has been successfully deleted');

    }
}
