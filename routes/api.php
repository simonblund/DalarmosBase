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
Route::middleware('auth:api_user')->prefix('v1')->group(function () {

Route::get('/user', function () {return "fisk";});

//Incidents
Route::get('/incidents', 'API\IncidentApiController@index');
Route::post('/incident/new', 'API\IncidentApiController@store');


});
