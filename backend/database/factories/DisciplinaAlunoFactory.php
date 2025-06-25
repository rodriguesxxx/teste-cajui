<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Disciplina;
use App\Models\DisciplinaAluno;
use Illuminate\Database\Eloquent\Factories\Factory;

class DisciplinaAlunoFactory extends Factory
{
    protected $model = DisciplinaAluno::class;
    
    public function definition(): array
    {
        $dataInicio = $this->faker->dateTimeBetween('-2 years', 'now');
        $dataFim = (clone $dataInicio)->modify('+6 months');

        return [
            'disciplina_id' => Disciplina::pluck('id')->random(),
            'aluno_id' => Aluno::pluck('id')->random(),
            'data_inicio' => $dataInicio->format('Y-m-d'),
            'data_fim' => $dataFim->format('Y-m-d'),
            'is_aprovado' => $this->faker->boolean(),
        ];
    }
}
