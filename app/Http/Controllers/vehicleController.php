<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

class vehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('admin.vehicle-settings')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string',
            'shortcode' => 'required|string|max:8',
            'phone' => 'required|string',
            'seats' => 'integer',
            'priority' => 'integer',
            'drivers_license' => 'required|string',
            'description' => 'string',
            'vehicle_registration' => 'string',
            'year' => 'string|max:4',

        ]);
        Vehicle::create([
            'name' => $request['name'],
            'shortcode' => $request['shortcode'],
            'phone' => $request['phone'],
            'seats' => $request['seats'],
            'priority' => $request['priority'],
            'drivers_license' => $request['drivers_license'],
            'description' => $request['description'],
            'vehicle_registration' => $request['vehicle_registration'],
            'year' => $request['year'],
            
        ]);
        return back()->with('status', 'Fordon har skapats');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }

    public function addUser(Request $request, $id)
    {
        $role = Role::find($id);
        $role->role_owners()->toggle($request->role_owners);

        return back()->with('status', 'Rollinnehav ändrat');
    }
}
