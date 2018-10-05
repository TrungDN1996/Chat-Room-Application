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

Route::group(['prefix' => 'room'], function() {
	Route::name('room')->group(function() {
		Route::get('{id}', 'ChatRoomController@index');
		Route::post('message/send', 'ChatRoomController@showMessage')->name('.message.send');
		Route::get('message/load', 'ChatRoomController@load')->name('.message.load');
		Route::get('search', 'ChatRoomController@getSearch')->name('.getSearch');
		Route::get('search/show', 'ChatRoomController@search')->name('.showSearch');
	});
});

Route::group(['prefix' => 'home'], function() {
	Route::name('home')->group(function() {
		Route::get('/', 'HomeController@index');
		Route::get('search', 'HomeController@search')->name('.search');
		Route::get('create', 'HomeController@getCreate')->name('.getCreate');
		Route::post('create', 'HomeController@create')->name('.create');
	});
});

Auth::routes();
