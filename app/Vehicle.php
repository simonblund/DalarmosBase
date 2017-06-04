<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'name', 'shortcode', 'phone',  'seats',  'priority',  'drivers_license',  
        'description',  'vehicle_registration',  'year',
    ];

    public function role_owners()
    {
        return $this->belongsToOne('App\ApiUser');
    }
}
