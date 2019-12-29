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
        return $this->hasMany('App\Post', 'post_id');
    }

    public function localGovernment()
    {
        return $this->belongsTo('App\Local_government', 'local_government_id');
    }

    public function town()
    {
        return $this->belongsTo('App\Town', 'town_id');
    }

    public function state()
    {
        return $this->belongsTo('App\State', 'state_id');
    }
}
