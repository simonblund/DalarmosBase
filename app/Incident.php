<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $fillable = [
        'active', 'message', 'address',  'pos-lan', 'pos-lon',  'type',  'area',  
        'details',  'time',
    ];
}
