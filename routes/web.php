<?php

use App\User;
use Illuminate\Support\Facades\Input;
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

Route::get('/home', 'UserController@index')->name('home');

Route::get('/profile', 'UserController@profile')->name('profile');

Route::post('/post', 'PostController@store')->name('post.store');

Route::post('/post/{id}', 'PostController@update')->name('post.update');

Route::get('/post/{id}/edit', 'PostController@edit')->name('post.edit');

Route::get('/post/{id}', 'PostController@destroy')->name('post.destroy');

Route::get('profile/follow/{id}', 'UserController@follow')->name('follow');

Route::get('profile/unfollow/{id}', 'UserController@unfollow')->name('unfollow');
