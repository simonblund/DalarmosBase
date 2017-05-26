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
            'access_vehicles' => 'required|string|max:255',
            'access_vehicles_incident' => 'required|string|max:255',
            'access_users' => 'required|string|max:255',
            'access_under_way' => 'required|string|max:255',
            'access_incident' => 'required|string|max:255',
            'access_incident_report' => 'required|string|max:255',
        ]);

        $apitype = ApiType::create([
            'name' => $request['name'],
            'access_vehicles' => $request['access_vehicles'],
            'access_vehicles_incident' => $request['access_vehicles_incident'],
            'access_users' => $request['access_users'],
            'access_under_way' => $request['access_under_way'],
            'access_incident' => $request['access_incident'],
            'access_incident_report' => $request['access_incident_report'],
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
