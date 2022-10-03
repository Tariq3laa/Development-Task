<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\User\Http\Controllers\AuthController;

Route::group([
    'prefix' => 'admin/user',
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group([
        'middleware' => 'auth:admin'
    ], function () {
        Route::apiResource('jobs', JobController::class);
    });
});
