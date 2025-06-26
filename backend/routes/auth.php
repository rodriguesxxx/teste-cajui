<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)
    ->prefix('/auth')
    ->group(function () {
        Route::post('/login', 'login')->name('auth.login');
        Route::post('/logout', 'logout')->middleware(JwtMiddleware::class)->name('auth.logout');
    });