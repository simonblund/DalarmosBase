<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\User;


class StoreUserSelfUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
            $user = User::find($this->route('id'));

            return $this->user()->id == $user->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = User::find($this->route('id'));
        
        return[
                
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                ],
            
            'primary_phone' => 'required|string|max:255',
            'secondaty_phone' => 'nullable|string|max:255',
            'telegram_id' => 'nullable|string|max:255',
            'street_address' => 'sometimes|nullable|string|max:255',
            'city_address' => 'sometimes|nullable|string|max:255',
            'postcode_address' => 'sometimes|nullable|string|max:255',
            'country_address' => 'sometimes|nullable|string|max:255',
            'birthday' => 'sometimes|nullable|date|max:255',
            
        ];
    }
}
