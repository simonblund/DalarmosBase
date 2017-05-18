<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserSelfUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                
            'email' => 'required|string|email|max:255|unique:users',
            
            'driverslicence' => 'required|string|max:10',
            'primary_phone' => 'required|string|max:255',
            'secondaty_phone' => 'nullable|string|max:255',
            'telegram_id' => 'nullable|string|max:255',
            'street_address' => 'sometimes|nullable|string|max:255',
            'city_address' => 'sometimes|nullable|string|max:255',
            'postcode_address' => 'sometimes|nullable|string|max:255',
            'country_address' => 'sometimes|nullable|string|max:255',
            'birthday' => 'sometimes|nullable|date|max:255',
            //'fire_department' => 'sometimes|required|string|max:255',
            //'is_admin' => 'sometimes|required|boolean|max:255',
            //'password' => 'sometimes|required|string|min:6|confirmed',
        ];
    }
}
