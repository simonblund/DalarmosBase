<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('v1/incidents', 'API\IncidentApiController@index')->middleware('auth:api','scope:get-incidents');
Route::middleware('auth:api')->prefix('v1')->group(function () {

Route::get('/user', function () {return "fisk";});

//Incidents 

Route::post('/incident/new', 'API\IncidentApiController@store');


});
