<?php

namespace App\Http\Controllers\Company;

use App\Models\Location;
use App\Models\User;
use App\Models\Company_Plan;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectID; 
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LocationStoreRequest;


 
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations=Location::where('company_id',new ObjectID(Auth::user()->id))
                                ->where('deleted_at', 'exists', false)
                                ->get();
        //return dd($locations[0]->id);
        return view('company.location',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('company.location_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationStoreRequest $request)
    {
        $location = new Location();
        $plan=Company_Plan::where('company_id',new ObjectID(Auth::user()->id))
        ->where('deleted_at', 'exists', false)
        ->orderby('created_at','desc')
        ->first();
        
        if ($plan->plan_id== new ObjectID('5d7305b850142027477a45e2')) { // gratis 5d7305b850142027477a45e2
            return redirect()->back()->withErrors(["Plan"=>"Tu plan actual no permite agregar marcadores"]);
        }elseif ($plan->plan_id== new ObjectID('5d64b7df3e3d5527794f4b9c')) { // basico 5d64b7df3e3d5527794f4b9c
            $locations=Location::where('company_id',new ObjectID(Auth::user()->id))
                                ->where('deleted_at', 'exists', false)
                                ->get();
            if (count($locations)===2) {
                return redirect()->back()->withErrors(["Plan"=>"Tu plan actual solo permite un maximo de dos marcadores"]);
            }
        }elseif ($plan->plan_id== new ObjectID('5d65a49d501420225f318496')) { // gold  5d65a49d501420225f318496
            
        }
        if($request->hasFile('marker')){
            if ($plan->plan_id != new ObjectID('5d64b7df3e3d5527794f4b9c')) { // basico 5d64b7df3e3d5527794f4b9c
                $file = $request->file('marker');
                $file_name = time().$file->getClientOriginalName(); //Nombrar como fecha actual + nombre original del archivo
                $file->move(public_path().'/img/markers/', $file_name);
                $location->img = $file_name;
            }else{
                $location->img = 'marcador-defecto.png';
            }

            $location->company_id= new ObjectID(Auth::user()->id);
            $location->name = $request->input('name');
            $location->coordinates = json_decode($request->get('waypoints')); 
            $location->save();
        }else{
            $marcadorD = 'marcador-defecto.png';
            $location->company_id= new ObjectID(Auth::user()->id);
            $location->name = $request->input('name');
            $location->coordinates = json_decode($request->get('waypoints')); 
            $location->img = $marcadorD;
            $location->save();
        }
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location=Location::find($id);
        $location->delete();
        return redirect()->route('home');
    }
}
