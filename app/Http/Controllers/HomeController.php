<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserDetail;
use App\ChatRoom;
use App\ChatRoomDetail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = UserDetail::select('related_user_id')
            ->where('user_id', Auth::user()->id)
            ->get();

        $users = User::select('id', 'name')
            ->whereIn('id', $id)
            ->get();

        $rooms = DB::table('chat_rooms')
            ->join('chat_room_details', 'chat_rooms.id', '=', 'chat_room_details.chat_room_id')
            ->select('chat_rooms.id', 'chat_rooms.name')
            ->where('chat_room_details.user_id', Auth::user()->id)
            ->get();

        return view('home', compact('users', 'rooms'));
    }

    /**
     * Search user
     * @param Request $request 
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $id = UserDetail::select('related_user_id')
            ->where('user_id', Auth::user()->id)
            ->get();

        $user = User::select('id', 'name')
            ->whereIn('id', $id)
            ->where('name', 'like', '%'.$request->name.'%')
            ->get();

        $searchs = $user;

        return view('elements.search-view', compact('searchs'));
    }

    /**
     * Get create 
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('elements.create-box');
    }

    /**
     * Create a chat room
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $chatRoom = [
            'name' => $request->name_input,
            'user_id' => $request->id
        ];

        ChatRoom::create($chatRoom);

        $room = ChatRoom::select('id', 'name')
            ->orderBy('id', 'DESC')
            ->first();

        ChatRoomDetail::create([
            'chat_room_id' => $room->id,
            'user_id' => $request->id
        ]);

        return view('elements.new-room', compact('room'));
    }

    /**
     * Logout account
     *
     * @return \Illuminate\Http\Response
     */
    Public function logout()
    {
        Auth::logout();
        
        return view('welcome');
    }
}
