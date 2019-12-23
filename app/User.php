<?php

namespace App;

use auth;
use App\Role;
use App\Profile;
use App\Local_government;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
// implements MustVerifyEmail, CanResetPassword
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'state_of_origin', 'sponsor_user_id', 
        'local_government_id','username','status'
    ];
  
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function localGovern()
    {
        return $this->belongsTo('App\Local_government', 'local_government_id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function contact()
    {
        return $this->hasMany(Contact::class);
    }

    public function hasAnyRoles($roles)
    {
        if($this->roles()->whereIn('name', $roles)->first()){
            return true;
        }

        return false;
    }

    public function hasRole($role)
    {
        if($this->roles()->where('name', $role)->first()){
            return true;
        }
        return false;
    }
    protected static function boot()
    {
        parent::boot();
        static::created( function($user){
            $user->profile()->create([
                'user_id' => $user->id,
                'bio' => "I'm ". $user->name,
                'image' => "admin.jpg"
            ]);
        });
    }
}
