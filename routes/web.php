<?php

use Illuminate\Support\Facades\Route;

$prefixAdmin = config('myConfig.url.prefixAdmin');

Route::group(['prefix' => $prefixAdmin], function () {
// ============================== SLIDER =============================
    $prefix = 'slider';
    $controllerName = 'slider';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/',                            ['as' => $controllerName, 'uses' => $controller . 'index']);
        Route::get('form/{id?}',                   ['as' => $controllerName . '/form', 'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::get('delete/{id}',                  ['as' => $controllerName . '/delete', 'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('status/change-{status}/{id}',  ['as' => $controllerName . '/status', 'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });

// ============================== DASHBOARD ===========================
    $prefix = 'dashboard';
    $controllerName = 'dashboard';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/',             ['as' => $controllerName, 'uses' => $controller . 'index']);
    });

});