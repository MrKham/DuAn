<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function () {
	Route::resource('post.like', 'Service\PostLikeController');
	Route::resource('post.comment', 'Service\PostCommentController');
	Route::resource('post.favorite', 'Service\FavoriteController');
	Route::get('allfavorite', 'Service\FavoriteController@index');
	Route::resource('order', 'Service\OrderController');

	Route::post('conversation', 'Service\ConversationController@store');
	Route::post('conversation/{conversation_id}/item', 'Service\ConversationController@addMessage');
	Route::get('conversation/{conversation_id}/item', 'Service\ConversationController@getMessage');
	Route::get('conversation', 'Service\ConversationController@index');

	Route::resource('device', 'Service\DeviceController');
	Route::resource('user', 'Service\UserController');

});

Route::resource("contact_message", "Service\Contact_messageController");
Route::post('user', 'Service\UserController@store');

Route::resource('post', 'Service\PostController');
Route::resource('category', 'Service\CategoryController');

Route::post('user/forgotpassword', 'Service\UserController@postEmail');
//Route::get('allfavorite', 'Service\FavoriteController@index');

