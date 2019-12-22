<?php

namespace App;

use App\Local_government;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name'
    ];

    public function localGovernments()
    {
    return $this->hasMany(Local_government::class);
    }

}