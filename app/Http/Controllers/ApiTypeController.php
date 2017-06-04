<?php

namespace App\Http\Controllers;

use App\ApiType;
use Illuminate\Http\Request;

class ApiTypeController extends Controller
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
            'name' => 'required|string|max:255',
            'access_vehicles' => 'array|max:255',
            'access_vehicles_incident' => 'array|max:255',
            'access_users' => 'array|max:255',
            'access_under_way' => 'array|max:255',
            'access_incident' => 'array|max:255',
            'access_incident_report' => 'array|max:255',
        ]);

        $access_vehiclesString = implode(",", $request->get('access_vehicles'));
        $access_vehicles_incidentString = implode(",", $request->get('access_vehicles_incident'));
        $access_usersString = implode(",", $request->get('access_users'));
        $access_under_wayString = implode(",", $request->get('access_under_way'));
        $access_incidentString = implode(",", $request->get('access_incident'));
        $access_incident_reportString = implode(",", $request->get('access_incident_report'));
        
        
        $apitype = ApiType::create([
            'name' => $request['name'],
            'access_vehicles' => $access_vehiclesString,
            'access_vehicles_incident' => $access_vehicles_incidentString,
            'access_users' => $access_usersString,
            'access_under_way' => $access_under_wayString,
            'access_incident' => $access_incidentString,
            'access_incident_report' => $access_incident_reportString,
        ]);
        return $apitype;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ApiType  $apiType
     * @return \Illuminate\Http\Response
     */
    public function show(ApiType $apiType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ApiType  $apiType
     * @return \Illuminate\Http\Response
     */
    public function edit(ApiType $apiType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ApiType  $apiType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApiType $apiType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ApiType  $apiType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApiType $apiType)
    {
        //
    }
}
