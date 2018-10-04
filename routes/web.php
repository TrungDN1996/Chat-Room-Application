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

Route::get('/', 'ChatRoomController@index');
Route::get('/message/send', 'ChatRoomController@showMessage');
Route::get('/message/update', 'ChatRoomController@update');
Route::get('/search/show', 'UserController@getSearch');
Route::get('/search/input', 'UserController@search');
