<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'vacancy', 'driverslicence', 'primary_phone', 'secondary_phone', 'telegram_id', 
        'street_address', 'city_address', 'postcode_address', 'country_address', 'birthday', 
        'fire_department', 'is_admin', 'password',
        'api_username', 'owner_id', 'APIType_id', 'is_API',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'birthday',
    ];

    public function isAdmin()
{
    return $this->is_admin; // this looks for an admin column in your users table
}

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function apitypes()
    {
        return $this->belongsTo('App\ApiType', 'APIType_id');
    }

    
}
