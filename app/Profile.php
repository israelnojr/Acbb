<?php

namespace App;

use App\User;
use Cache;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'phone',
        'image',
        'address',
        'ward',
        'bio',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function town()
    {
        return $this->belongsTo('App\Town', 'town_id');
    }

}
