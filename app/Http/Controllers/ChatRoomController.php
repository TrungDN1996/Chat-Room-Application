<?php

namespace App\Http\Controllers;
use App\ChatRoom as Room;
use App\ChatRoomMessage as Message;
use App\ChatRoomDetail as Detail;
use App\User;
use App\UserDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{

    /**
     * Display all users and message in Chat Room
     * @param  [int] $room 
     * @return Illuminate\Http\Response
     */
    public function index($room)
    {
    	$users = DB::table('chat_room_details')
    		->join('users', 'users.id', '=', 'chat_room_details.user_id')
    		->select('users.id', 'users.name')
    		->where('chat_room_details.chat_room_id', $room)
    		->get();

    	$messages = DB::table('chat_room_messages')
    		->join('users', 'users.id', '=', 'chat_room_messages.user_id')
    		->select('chat_room_messages.message', 'users.name', 'users.created_at')
    		->where('chat_room_messages.chat_room_id', $room)
    		->orderBy('chat_room_messages.created_at', "ASC")
    		->get();

    	$chatRoomName = DB::table('chat_rooms')
    		->select('name')
    		->where('id', $room)
    		->get();

    	return view('chat-room', compact('users', 'messages', 'chatRoomName', 'room'));
    }

    /**
     * Load message
     * @param  Request $request
     * @return Illuminate\Http\Response
     */
    public function load(Request $request) 
    {
    	$messages = DB::table('chat_room_messages')
    		->join('users', 'users.id', '=', 'chat_room_messages.user_id')
    		->select('chat_room_messages.message', 'users.name', 'users.created_at')
    		->where('chat_room_messages.chat_room_id', $request->chat_room_id)
    		->orderBy('chat_room_messages.created_at', "ASC")
    		->get();

    	return view('elements.message')
    		->with('messages', $messages);
    }

    /**
     * Show message
     * @param  Request $request
     * @return Illuminate\Http\Response
     */
    public function showMessage(Request $request)
    {
    	$message = $request->all();

    	Message::create($message);

    	$name = DB::table('users')
    		->select('name')
    		->where('id', $request->user_id)
    		->get();

    	return view('elements.message-view', compact('message', 'name'));
    }

    /**
     * Show result of searching
     * @param  Request $request
     * @return Illuminate\Http\Response
     */
    public function showSearch(Request $request)
    {
        $users = DB::table('users')
            ->select('id', 'name')
            ->where('name', 'like', '%'.$request->name.'%')
            ->get();

        $searchs = $users;

        return view('elements.usersList', compact('searchs'));
    }

    /**
     * Add contact in Chat Room
     * @param  $request $request
     * @return Illuminate\Http\Response
     */
    public function addContact(Request $request)
    {
        $user = User::select('id', 'name')
            ->where('name', $request->name)
            ->first();

        Detail::create([
            'chat_room_id' => $request->chat_room_id,
            'user_id' => $user->id
        ]);

        return view('elements.add-contact', compact('user'));
    }
}
