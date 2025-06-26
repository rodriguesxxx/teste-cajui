<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Disciplina;
use App\Models\DisciplinaAluno;
use Illuminate\Database\Seeder;

class DisciplinaAlunoSeeder extends Seeder
{
    public function run(): void
    {
        $disciplinas = Disciplina::pluck('id')->all();
        $alunos = Aluno::pluck('id')->all();

        $combinacoes = collect($disciplinas)
            ->crossJoin($alunos)
            ->shuffle()
            ->take(6);
        
        foreach ($combinacoes as [$disciplina_id, $aluno_id]) {
            DisciplinaAluno::factory()->create([
                'disciplina_id' => $disciplina_id,
                'aluno_id' => $aluno_id,
            ]);
        };
    }
}
