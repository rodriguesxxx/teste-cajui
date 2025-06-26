<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/ping', fn() => "pingou");

Route::prefix('/v1')->group(function (): void {
    Route::controller(AuthController::class)
        ->prefix('/auth')
        ->group(function () {
            Route::post('/login', 'login');
            Route::post('/logout', 'logout')->middleware(JwtMiddleware::class);
        });

    Route::middleware(JwtMiddleware::class)->prefix('/aluno')->group(function () {
        Route::controller(DisciplinaController::class)->prefix('/disciplinas')->group(function () {
            Route::get('/', 'indexDisciplinasAluno');
            Route::get('/{disciplina}', 'showDisciplinaAluno');
            Route::get('/{disciplina}/avaliacoes', 'showAvaliacoesAluno');
        });
    });
});

