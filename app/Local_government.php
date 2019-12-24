<?php

namespace App;

use App\User;
use App\State;
use Illuminate\Database\Eloquent\Model;

class Local_government extends Model
{
    protected $fillable = [
        'state_id', 'name'
    ];

    public function state()
    {
        return $this->belongsTo('App\State', 'state_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function town()
    {
        return $this->hasMany(Town::class);
    }
}
