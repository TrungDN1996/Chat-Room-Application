<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::get('/', function() {
	return view('welcome');
});

// Login
Auth::routes();

// Home page
Route::group(['prefix' => 'home'], function() {
	Route::name('home')->group(function() {
		Route::get('/', 'HomeController@index');
		Route::get('search', 'HomeController@search')->name('.search');
		Route::get('create', 'HomeController@getCreate')->name('.getCreate');
		Route::post('create', 'HomeController@create')->name('.create');
		Route::get('logout', 'HomeController@logout')->name('.logout');
	});
});

// Chat Room page
Route::group(['prefix' => 'room'], function() {
	Route::name('room')->group(function() {
		Route::get('{id}', 'ChatRoomController@index');
		Route::post('message/send', 'ChatRoomController@showMessage')->name('.message.send');
		Route::post('message/load', 'ChatRoomController@load')->name('.message.load');
		Route::get('search/show', 'ChatRoomController@showSearch')->name('.showSearch');
		Route::post('contact/add', 'ChatRoomController@addContact')->name('.addContact');
	});
});