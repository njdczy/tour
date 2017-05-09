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




Route::any('/wechat', 'WechatController@serve');


Route::group([
    'middleware'    => ['scopes'],
],function () {
    Route::get('form/{id}', 'FromController@index');
    Route::post('form/{id}', 'FromController@store');
    Route::get('/pyq', function () {
        return view('wechat.pyq');
    });
    Route::get('/pay', 'PayController@index')->name('pay');

    Route::get('/pay/ok',function (){
        return view('wechat.msg');
    });

});

//Route::group([
//    'prefix'        => 'flow',
//    'middleware'    => ['scopes'],
//],function () {
//    Route::get('/', 'FlowController@index');
//});

//Route::get('/mobile', 'MobileController@index')->name('mobile');
Route::get('/oauth', 'OauthController@index')->name('oauth');
Route::post('/notify', 'NotifyController@index')->name('notify');
