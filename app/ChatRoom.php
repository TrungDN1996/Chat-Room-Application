<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    protected $fillable = [
    	'id',
    	'name',
    	'user_id',
    ];

    public function chatRoomMessages ()
    {
    	return $this->hasMany('App\ChatRoomMessage');
    }

    public function chatRoomDetails ()
    {
    	return $this->hasMany('App\ChatRoomDetail');
    }
}
