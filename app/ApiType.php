<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiType extends Model
{
    protected $fillable = [
        'name', 'access_vehicles', 'access_vehicles_incident', 'access_users', 'access_under_way', 
        'access_incident', 'access_incident_report',
    ];

    
}
