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

Route::get('/', 'HomeController@index')->name('/');
Route::get('/home', 'PostController@home')->name('/home');
Route::get('/contacto', 'PostController@contact')->name('contacto');
Route::get('/estilos/{id}', 'TypeController@show');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile', 'UserController@update_avatar');

Route::resource('passwordreset', 'PasswordResetController');
Route::resource('user', 'UserController');
Route::resource('post', 'PostController');
Route::resource('type', 'TypeController');
Route::resource('comment', 'CommentController');
Route::post('/post/{id}/comment', 'CommentController@store');
Route::get('/gmaps', ['as ' => 'gmaps', 'uses' => 'GmapsController@index']);
