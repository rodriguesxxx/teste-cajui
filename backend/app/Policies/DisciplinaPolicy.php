<?php

namespace App\Policies;

use App\Models\Aluno;
use App\Models\Disciplina;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Response as HttpResponse;

class DisciplinaPolicy
{
    use HandlesAuthorization;

    public function listarDisciplinasAluno(User $user): Response
    {
        if ($this->isValidAluno($user->aluno())) {
            return Response::allow();
        }

        return Response::deny('Usuário não está vinculado a um aluno.', HttpResponse::HTTP_FORBIDDEN);
    }

    public function getDisciplinaAluno(User $user, Disciplina $disciplina): Response
    {
        $aluno = $user->aluno();
        if (!$this->isValidAluno($aluno)) {
            return Response::deny('Usuário não está vinculado a um aluno.', HttpResponse::HTTP_FORBIDDEN);
        }

        if (!$disciplina->hasAluno($aluno)) {
            return Response::deny('A disciplina informada não pertence ao aluno.', HttpResponse::HTTP_FORBIDDEN);
        }

        return Response::allow();
    }

    private function isValidAluno(?Aluno $aluno): bool
    {
        return !is_null($aluno) && $aluno instanceof Aluno;
    }
}