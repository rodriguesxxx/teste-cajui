<?php

namespace Database\Factories;

use App\Models\Avaliacao;
use App\Models\Disciplina;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvaliacaoFactory extends Factory
{
    protected $model = Avaliacao::class;

    public function definition(): array
    {
        return [
            'titulo' => 'Prova ' . $this->faker->numberBetween(1, 10),
            'disciplina_id' => Disciplina::pluck('id')->random(),
            'data' => $this->faker->dateTimeBetween('2025-01-01', '2025-12-31')->format('Y-m-d'),
            'nota_maxima' => 10,
        ];
    }
}
