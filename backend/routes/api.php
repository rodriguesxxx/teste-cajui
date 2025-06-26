<?php

use Illuminate\Support\Facades\Route;

Route::get('/ping', fn() => "pingou");

require __DIR__.'/auth.php';

require __DIR__.'/aluno.php';


