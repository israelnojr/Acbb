<?php

namespace App;

use App\Post_Comment;
use App\Post_Location;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post_category_id',
        'user_id',
        'view_count',
        'title',
        'slug',
        'image',
        'content',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Post_Category', 'post_category_id');
    }

    public function location()
    {
        return $this->belongsTo(Post_Location::class);
    }

    public function comments()
    {
        return $this->hasMany(Post_Comment::class, 'post_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::created( function($post){
            $post->location()->create([
                'post_id' => $post->id,
                'state_id' => $post->user->state_id,
                'local_government_id' => $post->user->localGovern->id,
                'town_id' => $post->user->profile->town->id,
            ]);
        });
    }
}
