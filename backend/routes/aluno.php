<?php

use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\PerfilController;
use App\Http\Middleware\JwtMiddleware;
use App\Models\Disciplina;
use Illuminate\Support\Facades\Route;

Route::middleware(JwtMiddleware::class)->prefix('/aluno')->group(function () {
    Route::controller(PerfilController::class)->prefix('/perfil')->group(function () {
        Route::get('/', 'me');
        Route::post('/editar', 'update');
    });

    Route::controller(DisciplinaController::class)->prefix('/disciplinas')->group(function () {
        Route::get('/', 'indexDisciplinasAluno')->can('listarDisciplinasAluno', Disciplina::class);
        Route::get('/{disciplina}', 'showDisciplinaAluno')->can('getDisciplinaAluno', ['disciplina']);
        Route::get('/{disciplina}/avaliacoes', 'showAvaliacoesAluno')->can('getDisciplinaAluno', ['disciplina']);
        Route::get('/{disciplina}/media', 'showMediaAluno')->can('getDisciplinaAluno', ['disciplina']);
    });
});