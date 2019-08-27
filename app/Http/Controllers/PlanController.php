<?php

namespace App\Http\Controllers;


use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarStorePlan;

class PlanController extends Controller
{

    public function index()
    {
        $plans=Plan::all();
        return view('admin.plans',compact('plans'));
    }

    public function create()
    {
       return view('admin.plans_create');
    }

    public function show($id)
    {
        //
    }

    public function store(ValidarStorePlan $request)
    {
        $plan = new Plan;
        $plan->name = $request->input("name");
        $plan->description = $request->input("description");
        $plan->price = $request->input("price");
        $plan->duration = $request->input("duration");

        $plan->save();
        return redirect()->route('plans');
        //return($plan);
    }

    public function edit($id)
    {
        return view('admin.plans_edit');
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy($id)
    {
        $plan = Plan::find($id);
        $plan-> delete();
        return redirect()->route('plans');
    }
}
