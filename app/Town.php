<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    public function profile()
    {
        return $this->hasMany(Profile::class);
    }

    public function localGovern()
    {
        return $this->belongsTo('App\Local_government', 'local_government_id');
    }
}
