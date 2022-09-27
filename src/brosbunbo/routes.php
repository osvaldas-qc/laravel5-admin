<?php

$prefix = config('bunbo.path');

/**
 * Admin Panel Routes
 */
Route::group(['prefix' => $prefix, 'namespace' => 'BunBo\Http\Controllers'], function()
{
    Route::group(['middleware' => 'BunBo\Http\Middleware\RoleAdmin'], function()
    {
        //Route::get('/',     ['as' => 'admin.home', 'uses' => 'HomeController@index']);
        Route::get('/',     ['as' => 'admin.home', 'uses' => '\App\Http\Controllers\ProjectsController@redirectToCalendar']);
    });

    Route::get('login',     ['as' => 'admin.login',     'uses' => 'AuthController@login']);
    Route::post('login',    ['as' => 'admin.doLogin',   'uses' => 'AuthController@doLogin']);
    Route::get('logout',    ['as' => 'admin.logout',    'uses' => 'AuthController@logout']);
});