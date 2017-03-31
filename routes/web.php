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
    return view('index');
});
Route::get('/cmw', function () {
    return view('cmw');
});
Route::get('/gzw', function () {
    return view('gzw');
});
Route::get('/dsw', function () {
    return view('dsw');
});
Route::get('/wzd', function () {
    return view('wzd');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::any('/wechat', 'WechatController@serve');
