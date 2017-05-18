<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\StoreUserSelfUpdate;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',     
            'email' => 'required|string|email|max:255|unique:users',
            'vacancy' => 'required|string|max:10',
            'driverslicence' => 'required|string|max:10',
            'primary_phone' => 'required|string|max:255',
            'secondaty_phone' => 'nullable|string|max:255',
            'telegram_id' => 'nullable|string|max:255',
            'street_address' => 'sometimes|nullable|string|max:255',
            'city_address' => 'sometimes|nullable|string|max:255',
            'postcode_address' => 'sometimes|nullable|string|max:255',
            'country_address' => 'sometimes|nullable|string|max:255',
            'birthday' => 'sometimes|nullable|date|max:255',
            'fire_department' => 'sometimes|required|string|max:255',
            'is_admin' => 'sometimes|required|boolean|max:255',
            'password' => 'sometimes|required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'vacancy' => $data['vacancy'],
            'driverslicence' => $data['driverslicence'],
            'primary_phone' => $data['primary_phone'],
            'secondary_phone' => $data['secondary_phone'],
            'telegram_id' => $data['telegram_id'],
            //'street_address' => $data['street_address'],
            //'city_address' => $data['city_address'],
            //'postcode_address' => $data['postcode_address'],
            //'country_address' => $data['country_address'],
            //'birthday' => $data['birthday'],
            'fire_department' => $data['fire_department'],
            'is_admin' => $data['is_admin'],
            'password' => bcrypt($data['password']),
        ]);
    }

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
        return $id;
    }

}
