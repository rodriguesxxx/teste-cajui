<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/ping', fn() => "pingou");

Route::prefix('/v1')->group(function (): void {
    Route::controller(AuthController::class)
        ->prefix('/auth')
        ->group(function () {
            Route::post('/login', 'login');
        });
});

