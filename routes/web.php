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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/author/{user}', 'AuthorController@author')->name('author');

Route::resource('/post', 'PostController');
Route::post('/comment/create/{id}', 'CommentController@store');
Route::put('/comment/update/{id}', 'CommentController@update');




