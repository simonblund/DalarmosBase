<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $fillable = [
        'active', 'message', 'address',  'position',  'type',  'area',  
        'details',  'time',
    ];
}
