<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDetail;

class UserController extends Controller
{
    public function getSearch ()
    {
    	return view('elements.search-box');
    }

    public function search ($name)
    {
    	$users = DB::table('users')
    		->select('id', 'name')
    		->where('name', 'like', '%'.$name.'%')
    		->get();

    	return view();
    }
}
