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

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/', 'PostController@index')->name('blog');


Auth::routes();


Route::get('/author/{user}', 'AuthorController@author')->name('author');
Route::get('/post/{post}', 'PostController@post')->name('post');
Route::post('/post/create', 'PostController@store');
Route::post('/comment/create/{id}', 'CommentController@store');
Route::put('/comment/update/{id}', 'CommentController@update');
Route::post('/post/{post}/edit', 'PostController@edit')->name('post_edit');
Route::put('/post/{post}/update', 'PostController@update');
Route::delete('/post/{post}/delete', 'PostController@destroy')->name('post_delete');


