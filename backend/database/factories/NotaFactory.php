<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Avaliacao;
use App\Models\Nota;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotaFactory extends Factory
{
    protected $model = Nota::class;

    public function definition(): array
    {
        return [
            'aluno_id' => Aluno::pluck('id')->random(),
            'avaliacao_id' => Avaliacao::pluck('id')->random(),
            'nota' => $this->faker->numberBetween(0, 25),
        ];
    }
}
