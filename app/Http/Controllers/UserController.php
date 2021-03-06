<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserSelfUpdate;


class UserController extends Controller
{
    /**
     * When a user wants to see and edit it's own information.
     *
     * @param  array  $data
     * @return User
     */
    protected function edit()
    {
        return view('settings.selfedit');
    }

     /**
     * When a user edits it's own information.
     *
     * @param  array  $data
     * @return User
     */
    protected function update(StoreUserSelfUpdate $request, $id)
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

     /**
     * When a user updates it's own password.
     *
     * @param  array  $data
     * @return User
     */
    protected function updatePassword(Request $request, $id)
    {

        $this->validate(request(), [
            'old_password' => [
                'required',
                'string',
                'min:6',
            ],
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::find($id);
        if ($user == Auth::user() && $user->password == bcrypt($request->old_password))
        {
        $user->update([
            'password' => bcrypt($request['password']),
        ]);
        $user->save();
        }

        return back()->with('status', 'Lösenordet uppdaterades');
    }


    
}
