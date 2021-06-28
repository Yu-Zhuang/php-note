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

Route::get('/', 'PostController@index');

Route::get('/calculator', 'CalculatorController@add');
Route::get('/test', 'CalculatorController@test');

Route::get('/todo', 'TodoController@index');
Route::post('/store', 'TodoController@store');
Route::get('/show/{id}', 'TodoController@show');
Route::post('/update/{id}', 'TodoController@update');
Route::delete('/delete/{id}', 'TodoController@destroy');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

// copy insta
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/p/create', 'PostController@create');
Route::post('/p', 'PostController@store');
Route::get('/p/{post}', 'PostController@show');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

Route::post('follow/{user}','FollowController@store');