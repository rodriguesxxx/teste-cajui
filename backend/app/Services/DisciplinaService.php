<?php

namespace App\Services;

use App\Exceptions\DisciplinaException;
use App\Models\Aluno;
use App\Models\Disciplina;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class DisciplinaService implements IDisciplinaService
{
    public function listarDisciplinasAluno(User $user): Collection
    {
        $aluno = $user->aluno();

        $this->canListarDisciplinasAluno($aluno);

        try {
            return $aluno->disciplinas()->get();
        } catch(\Exception) {
            throw new DisciplinaException("Erro interno ao listar disciplinas!");    
        }
    }

    public function getDisciplinaAluno(Disciplina $disciplina, User $user): Disciplina
    {
        $aluno = $user->aluno();

        $this->canVisualizarDisciplinaAluno($disciplina, $aluno);

        try {
            return $disciplina;
        } catch(\Exception) {
            throw new DisciplinaException("Erro interno ao listar disciplinas!");    
        }  
    }

    private function canListarDisciplinasAluno(?Aluno $aluno): void
    {
        if(is_null($aluno)) {
            throw new DisciplinaException("Aluno não encontrado ou não existe!");    
        }
    }

    private function canVisualizarDisciplinaAluno(Disciplina $disciplina, ?Aluno $aluno): void
    {
        $this->canListarDisciplinasAluno($aluno);

        if(!$disciplina->isAluno($aluno)) {
            throw new DisciplinaException("A disciplina informada não pertence ao aluno!");    
        }
    }
}