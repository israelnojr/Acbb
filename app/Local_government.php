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
        return $this->hasOne(State::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
