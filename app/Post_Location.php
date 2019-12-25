<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_Location extends Model
{
    protected $fillable = [
        'post_id',
        'state_id',
        'local_government_id',
        'town_id',
    ];

    public function posts()
    {
        return $this->belongsTo('App\Post', 'post_id');
    }
}
