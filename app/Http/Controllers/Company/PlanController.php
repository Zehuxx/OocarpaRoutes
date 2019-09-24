<?php

namespace App\Http\Controllers\Company;

use App\Models\Plan;
use App\Models\Company_Plan as CompanyPlan;
use MongoDB\BSON\ObjectID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Banner;

class PlanController extends Controller
{
    public function index()
    {
        $banner = Banner::getBanner();
        $planes = Plan::all();
        $planBuyed = CompanyPlan::all()->where('company_id', Auth::user()->id)->sortByDesc('created_at')->first();

        return view('company.planes', compact('planes', "planBuyed", 'banner'));
    }

    public function buyPlan($id) {
        $planBuyed = CompanyPlan::all()->where('company_id', Auth::user()->id)->sortByDesc('created_at')->first();
        $msg = "Plan adquirido exitosamente";

        if ($planBuyed != NULL) {
            if (Carbon::now() > (new Carbon($planBuyed->end_date)) || $planBuyed->Plan->name == 'Gratis') {
                $temp = Plan::find($id);

                $plan = new CompanyPlan();
                $plan->company_id = new ObjectID(Auth::user()->id);
                $plan->plan_id = new ObjectID($id);
                $plan->start_date = Carbon::now()->toDateTimeString();
                $plan->end_date = Carbon::now()->addDay($temp->days)->toDateTimeString();
                $plan->save();
            } else {
                $msg = "Ya tienes un plan vigente, espera a que termine el actual para contratar uno nuevo";
            }
        } else {
            $msg = "Error";
        }

        return redirect()->route('company plan')->with('msg', $msg);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function show()
    {
        //
    }
}
