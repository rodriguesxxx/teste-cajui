<?php

namespace App\Services;

use App\Models\Disciplina;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface IDisciplinaService
{
    public function listarDisciplinasAluno(User $user): Collection;

    public function getDisciplinaAluno(Disciplina $disciplina, User $user): Disciplina;
}