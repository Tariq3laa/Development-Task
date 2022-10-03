<?php

use Illuminate\Support\Facades\Route;
use Modules\Website\User\Http\Controllers\AuthController;

Route::group([
    'prefix' => 'website/user',
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group([
        'middleware' => 'auth:client'
    ], function () {
        Route::get('profile', [AuthController::class, 'profile']);
    });
});
