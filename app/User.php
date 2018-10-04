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
        'id',
        'name', 
        'email', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function chatRooms ()
    {
        return $this->hasMany('App\ChatRoom');
    }

    public function chatRoomMessages ()
    {
        return $this->hasMany('App\ChatRoomMessage');
    }

    public function userDetails ()
    {
        return $this->hasMany('App\UserDetail');
    }

    public function chatRoomDetails ()
    {
        return $this->hasMany('App\ChatRoomDetail');
    }
}
