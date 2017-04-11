<?php

Admin::registerHelpersRoutes();

Route::group([
    'prefix'        => config('admin.prefix'),
    'namespace'     => Admin::controllerNamespace(),
    'middleware'    => ['web', 'admin'],
], function () {

    Route::get('/', 'HomeController@index');

    Route::resources([
        'users'  => 'UsersController',
    ]);
    Route::resources([
        'trips'  => 'TripsController',
    ]);

    Route::get('/triplists/{tid}', 'TripListsController@index');
    Route::get('/triplists/{tid}/create', 'TripListsController@create');
    Route::get('/triplists/{tid}/{id}/edit', 'TripListsController@edit');
    Route::put('/triplists/{tid}/{id}', 'TripListsController@update');
    Route::post('/triplists/{tid}', 'TripListsController@store');
    Route::delete('/triplists/{tid}/{id}', 'TripListsController@destroy');

    Route::get('/picture/{tlid}', 'PictureController@index');
    Route::get('/picture/{tlid}/create', 'PictureController@create');
    Route::get('/picture/{tlid}/{id}/edit', 'PictureController@edit');
    Route::put('/picture/{tlid}/{id}', 'PictureController@update');
    Route::post('/picture/{tlid}', 'PictureController@store');
    Route::delete('/picture/{tlid}/{id}', 'PictureController@destroy');

    Route::get('/order/{tlid}/{id}', 'OrderController@index');

});
