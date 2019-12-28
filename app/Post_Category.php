<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'user_id',
        'view_count',
        'status'
    ];
  
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
