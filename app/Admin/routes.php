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

});
