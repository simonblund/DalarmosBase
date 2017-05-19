<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserSelfUpdate;


class UserController extends Controller
{
     /**
     * When a user edits it's own information.
     *
     * @param  array  $data
     * @return User
     */
    protected function selfedit(StoreUserSelfUpdate $request, $id)
    {
        $user = User::find($id);
        
        $user->update([
            //'first_name' => $data['first_name'],
            //'last_name' => $data['last_name'],
            'email' => $request['email'],
            //'vacancy' => $request['vacancy'],
            //'driverslicence' => $request['driverslicence'],
            'primary_phone' => $request['primary_phone'],
            'secondary_phone' => $request['secondary_phone'],
            'telegram_id' => $request['telegram_id'],
            'street_address' => $request['street_address'],
            'city_address' => $request['city_address'],
            'postcode_address' => $request['postcode_address'],
            'country_address' => $request['country_address'],
            'birthday' => $request['birthday'],
            //'fire_department' => $request['fire_department'],
            //'is_admin' => $request['is_admin'],
            //'password' => bcrypt($request['password']),
        ]);

        $user->save();
        return $user;
    }
}
