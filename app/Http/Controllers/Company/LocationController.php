<?php

namespace App\Http\Controllers\Company;

use App\Models\Location;
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
        //
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
        if($request->hasFile('marker')){
            $file = $request->file('marker');
            $file_name = time().$file->getClientOriginalName(); //Nombrar como fecha actual + nombre original del archivo
            $file->move(public_path().'/img/markers/', $file_name);

            $location->company_id= new ObjectID(Auth::user()->id);
            $location->name = $request->input('name');
            $location->coordinates = json_decode($request->get('waypoints')); 
            $location->img = $file_name;
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
        //
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
        //
    }
}
