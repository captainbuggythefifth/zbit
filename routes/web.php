<?php

use App\Events\MessagePosted;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/profile/{username}', 'ProfileController@profile');

Route::resource('/articles', 'ArticlesController');

Route::get('/chat', function (){
    return view('chat');
})->middleware('auth');


Route::get('/messages', function(){
    return App\Message::with('user')->get();
})->middleware('auth');

Route::post('/messages', function(){
    $aUser = Auth::user();
    $oMessage = $aUser->messages()->create([
        'message' => request()->get('message')
    ]);

    event(new MessagePosted($oMessage, $aUser));

    return ['status' => 'OK'];
})->middleware('auth');