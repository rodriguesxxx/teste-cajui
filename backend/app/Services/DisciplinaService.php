<?php

namespace App\Services;

use App\Exceptions\DisciplinaException;
use App\Models\Aluno;
use App\Models\Avaliacao;
use App\Models\Disciplina;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class DisciplinaService implements IDisciplinaService
{
    public function listarDisciplinasAluno(User $user): Collection
    {
        $aluno = $user->aluno();
        $this->canListarDisciplinasAluno($aluno);

        return $aluno->disciplinas()->get();
    }

    public function getDisciplinaAluno(Disciplina $disciplina, User $user): Disciplina
    {
        $this->canVisualizarDisciplinaAluno($disciplina, $user->aluno());

        return $disciplina;
    }

    public function listarAvaliacoesAlunoPorDisciplina(Disciplina $disciplina, User $user): Collection
    {
        $this->canVisualizarDisciplinaAluno($disciplina, $user->aluno());

        return $disciplina->avaliacoes()->orderBy('data')->get();
    }

    public function calcularMediaAluno(Disciplina $disciplina, User $user): float
    {
        $avaliacoes = $this->listarAvaliacoesAlunoPorDisciplina($disciplina, $user);
        $aluno = $user->aluno();

        $notas = $avaliacoes->reduce(function ($carry, Avaliacao $avaliacao) use ($aluno) {
            $nota = (float) ($aluno->nota_avaliacao($avaliacao->id)->nota ?? 0);
            return $carry + $nota;
        }, 0);

        return $notas / $avaliacoes->count();
    }

    private function canListarDisciplinasAluno(?Aluno $aluno): void
    {
        if (is_null($aluno)) {
            throw new DisciplinaException("Aluno não encontrado ou não existe!");
        }
    }

    private function canVisualizarDisciplinaAluno(Disciplina $disciplina, ?Aluno $aluno): void
    {
        $this->canListarDisciplinasAluno($aluno);

        if (!$disciplina->hasAluno($aluno)) {
            throw new DisciplinaException("A disciplina informada não pertence ao aluno!");
        }
    }
}