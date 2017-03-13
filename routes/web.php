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

Route::group(['prefix' => 'admin'], function(){
    Route::get('dashboard', 'AdminController@index');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/profile', 'ProfileController');

Route::resource('/articles', 'ArticlesController');

Route::resource('/posts', 'PostsController');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


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
