<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_Comment extends Model
{
    protected $fillable = [
        'comment', 'user_id', 'post_id','status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post_Comment');
    }
}