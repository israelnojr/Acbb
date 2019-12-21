<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name'
    ];

    public function localGovernments()
    {
    return $this->hasMany('App\Local_government');
    }

}