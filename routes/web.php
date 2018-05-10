<?php

use Illuminate\Routing\RouteGroup;

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/author/{user}', 'AuthorController@author')->name('author');

Route::resource('/post', 'PostController');

Route::resource('post/{post}/comment', 'CommentController');

Route::post('like/{type}/up', 'LikeController@postUp');
Route::delete('like/{type}/down', 'LikeController@postDown');
/* Route::post('comment/likes/up', 'LikeController@commentUp');
Route::delete('comment/likes/down', 'LikeController@commentDown'); */







