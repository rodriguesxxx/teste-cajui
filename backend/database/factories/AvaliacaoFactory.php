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
            'titulo' => $this->faker->word(),
            'disciplina_id' => Disciplina::pluck('id')->random(),
            'data' => $this->faker->date(),
            'nota_maxima' => $this->faker->numberBetween(0, 25),
        ];
    }
}
