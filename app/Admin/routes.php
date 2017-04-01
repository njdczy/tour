<?php

Admin::registerHelpersRoutes();

Route::group([
    'prefix'        => config('admin.prefix'),
    'namespace'     => Admin::controllerNamespace(),
    'middleware'    => ['web', 'admin'],
], function () {

    Route::get('/', 'HomeController@index');

    //微信路由组
    Route::group([
        'prefix'        => 'wechat',
        'middleware'    => ['web', 'admin'],
    ],function () {
        //管理理由组
        Route::group([
            'prefix'        => 'manage',
        ],function () {
            //素材组
            Route::group([
                'prefix'        => 'sc',
            ],function () {
                //图文
                Route::get('/news', 'NewsController@index');
                //图片
                Route::get('/picture', 'PicController@index');
            });
        });
    });
});
