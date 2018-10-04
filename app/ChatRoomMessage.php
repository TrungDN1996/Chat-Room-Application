<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatRoomMessage extends Model
{
    protected $fillable = [
    	'chat_room_id',
    	'user_id',
    	'message',
    ];

    public function user ()
    {
    	return $this->belongsTo('App\User');
    }

    public function chatRoom ()
    {
    	return $this->belongsTo('App\ChatRoom');
    }
}
