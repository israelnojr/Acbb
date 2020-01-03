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
        'town_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function town()
    {
        return $this->belongsTo('App\Town', 'town_id');
    }

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/admin.jpg';
        return '/storage/'. $imagePath;
    }

}
