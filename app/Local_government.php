<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local_government extends Model
{
    protected $fillable = [
        'state_id', 'name'
    ];

    public function State()
    {
        return $this->hasOne('App\State');
    }

    public function Users()
    {
        return $this->belongsToMany('App\User');
    }
}
