<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /** relation of user and twist */
    public function twist(){
        return $this->hasMany(\App\Twist::class);
    }

    /** relation of user and group  */
    public function groups(){
        return $this->belongsToMany(\App\Group::class);
    }

    /** relation of user and user (follower and followee)  */
    public function follow(){
        return $this->belongsToMany(\App\User::class,'follow','follower_id','followee_id');
    }
    
    /** relation of user and user (follower and followee)  */
    public function followed(){
        return $this->belongsToMany(\App\User::class,'follow','followee_id','follower_id');
    }

}



