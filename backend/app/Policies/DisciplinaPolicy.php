<?php

namespace App\Policies;

use App\Models\Aluno;
use App\Models\Disciplina;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DisciplinaPolicy
{
    use HandlesAuthorization;

    public function listarDisciplinasAluno(User $user): Response
    {

        $hasPermission = Response::deny();

        if ($this->isValidAluno($user->aluno())) {
            $hasPermission = Response::allow();
        }

        return $hasPermission;
    }

    public function getDisciplinaAluno(User $user, Disciplina $disciplina): Response
    {

        $hasPermission = Response::deny();

        $aluno = $user->aluno();
        if ($this->isValidAluno($aluno) && $disciplina->hasAluno($aluno)) {
            $hasPermission = Response::allow();
        }

        return $hasPermission;
    }

    private function isValidAluno(?Aluno $aluno): bool
    {
        return !is_null($aluno) && $aluno instanceof Aluno;
    }
}