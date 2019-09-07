<?php

namespace App\Http\Controllers\Company;

use App\Models\Plan;
//use MongoDB\BSON\ObjectID;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    public function index()
    {
        $planes = Plan::all();
        return view('company.planes', compact('planes'));
        //return($planes);


    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        //
    }
}
