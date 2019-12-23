<?php

namespace App;

use App\User;
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
}
