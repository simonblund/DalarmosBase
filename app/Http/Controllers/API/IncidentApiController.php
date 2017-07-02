<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Incident;

class IncidentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Incident::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

            'type' => 'string',
            'area' => 'string',
            'details' => 'string',
            'time' => 'string',
        ]);
        $incident = Incident::create([
            'message' => $request['message'],
            'address' => $request['address'],

            'type' => $request['type'],
            'area' => $request['area'],
            'details' => $request['details'],
            'time' => $request['time'],
            
        ]);
        return $incident;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Incident::find($id);
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
        $this->validate(request(), [
            'active' => 'string',
            'message' => 'string',
            'address' => 'string',

            'type' => 'string',
            'area' => 'string',
            'details' => 'string',
            'time' => 'string',
        ]);
        $incident = Incident::find($id)->update([
            'message' => $request['message'],
            'address' => $request['address'],

            'type' => $request['type'],
            'area' => $request['area'],
            'details' => $request['details'],
            'time' => $request['time'],
            
        ]);
        return $incident;
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
