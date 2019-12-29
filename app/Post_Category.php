<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Post_Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'user_id',
        'view_count',
        'status',
        'image'
    ];
  
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    // public function posts()
    // {
    //     $this->hasMany(Post::class, 'id', 'post_category_id');
    // }
}
