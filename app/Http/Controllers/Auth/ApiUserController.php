<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\StoreUserSelfUpdate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ApiUser;
use App\ApiType;
use App\Vehicle;
use App\User;




class ApiUserController extends Controller
{
   /**
     * When a user wants to see and edit it's own information.
     *
     * @param  array  $data
     * @return User
     */
    protected function create()
    {
        $api_users = ApiUser::with('vehicle', 'api_types', 'owner')->get();
        $vehicles = Vehicle::all();
        $admins = User::all()->where('is_admin', 1);
        $api_types = ApiType::all();
        return view('admin.api-users')->with('api_users', $api_users)->with('admins', $admins)->with('api_types', $api_types)->with('vehicles', $vehicles);
    }

    /**
     * When a new API user is created.
     *
     * @param  array  $data
     * @return User
     */
    protected function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'primary_phone' => 'required|string',
            'fire_department' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'owner_id' => 'required|string|max:255',
            'APIType_id' => 'required|string|max:255',
            
        ]);

        
        $user = ApiUser::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'primary_phone' => $request['primary_phone'],
            'fire_department' => $request['fire_department'],
            'password' => bcrypt($request['password']),
            'owner_id' => $request['owner_id'],
            'APIType_id' => $request['APIType_id'],
            'vehicle_id' => $request['vehicle_id'],
        ]);
        return $user;
    }


    /**
     * When a user wants to see and edit it's own information.
     *
     * @param  array  $data
     * @return User
     */
    protected function edit()
    {
       
    }

     /**
     * When a user edits it's own information.
     *
     * @param  array  $data
     * @return User
     */
    protected function update()
    {
       
    }

     
     
}
