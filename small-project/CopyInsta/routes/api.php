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

Route::get('/test', function() {
    return ['msg'=> 'sucess', 'code' => 200];
})->middleware('mymidware');

Route::post('/test', function() {
    return ['msg' => 'post sucess', 'code' => 200];
});
