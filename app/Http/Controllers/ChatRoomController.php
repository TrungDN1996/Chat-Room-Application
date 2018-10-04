<?php

namespace App\Http\Controllers;
use App\ChatRoom as Room;
use App\ChatRoomMessage as Message;
use App\ChatRoomDetail as Detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{
    public function index ()
    {
    	$users = DB::table('chat_room_details')
    		->join('users', 'users.id', '=', 'chat_room_details.user_id')
    		->select('users.id', 'users.name')
    		->where('chat_room_details.chat_room_id', 1)
    		->get();

    	$messages = DB::table('chat_room_messages')
    		->join('users', 'users.id', '=', 'chat_room_messages.user_id')
    		->select('chat_room_messages.message', 'users.name', 'users.created_at')
    		->where('chat_room_messages.chat_room_id', 1)
    		->orderBy('chat_room_messages.created_at', "ASC")
    		->get();

    	$chatRoomName = DB::table('chat_rooms')
    		->select('name')
    		->where('id', 1)
    		->get();

    	return view('chat-room', compact('users', 'messages', 'chatRoomName'));
    }

    public function update (Request $request) 
    {
    	$messages = DB::table('chat_room_messages')
    		->join('users', 'users.id', '=', 'chat_room_messages.user_id')
    		->select('chat_room_messages.message', 'users.name', 'users.created_at')
    		->where('chat_room_messages.chat_room_id', $request->roomID)
    		->orderBy('chat_room_messages.created_at', "ASC")
    		->get();

    	return view('elements.message')
    		->with('messages', $messages);
    }

    public function showMessage (Request $request)
    {
    	$message = $request->all();

    	Message::create($message);

    	$name = DB::table('users')
    		->select('name')
    		->where('id', $request->user_id)
    		->get();

    	return view('elements.search-view', compact('message', 'name'));
    }
}
