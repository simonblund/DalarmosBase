<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'shortcode', 'expiration_time', 
    ];

    public function role_owners()
    {
        return $this->belongsToMany('App\User');
    }
}
