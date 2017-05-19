<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/self-edit', 'UserController@edit');

Route::patch('/user/{id}/edit', 'UserController@update');
Route::patch('/user/{id}/password', 'UserController@updatePassword');

Route::get('/admin/roles', 'roleController@index');
Route::post('/admin/roles/new', 'roleController@store');