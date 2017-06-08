<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidents = Incident::all();
        return $incidents;
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
            'active' => 'string',
            'message' => 'string',
            'address' => 'string',
            'position' => 'string',
            'type' => 'string',
            'area' => 'string',
            'details' => 'string',
            'time' => 'string',
        ]);
        Incident::create([
            'message' => $request['message'],
            'address' => $request['address'],
            'position' => $request['position'],
            'type' => $request['type'],
            'area' => $request['area'],
            'details' => $request['details'],
            'time' => $request['time'],
            
        ]);
        return back()->with('status', 'Larm skapat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
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
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }

}
