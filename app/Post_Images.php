<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_Images extends Model
{
    protected $fillable = [
        'filename', 'post_id'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
