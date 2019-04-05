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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{post}', 'HomeController@showPost')->name('post.show');
Route::post('/post/{post}/comments', 'CommentController@store')->name('comments.store');


Route::namespace('BackOffice')
    ->middleware('auth')
    ->prefix('back-offise')
    ->name('back-office.')
    ->group(function () {
        Route::get('/posts', 'PostController@index')->name('posts');
        Route::resource('posts', 'PostController');
    });