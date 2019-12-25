<?php

namespace App;

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

    public function location()
    {
        return $this->hasMany(Post_Location::class);
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
