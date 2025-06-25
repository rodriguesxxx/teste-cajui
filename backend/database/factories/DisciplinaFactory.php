<?php

namespace Database\Factories;

use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DisciplinaFactory extends Factory
{
    protected $model = Disciplina::class;
    
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word(),
            'curso_id' => Curso::pluck('id')->random(),
            'professor_id' => Professor::pluck('id')->random(),
            'periodo' => $this->faker->numberBetween(1, 6),
            'ementa' => $this->faker->text(),
            'carga_horaria' => $this->faker->randomElement([40, 80, 120])
        ];
    }
}
