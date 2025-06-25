<?php

namespace Database\Factories;

use App\Enums\NivelCursoEnum;
use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

class CursoFactory extends Factory
{
    protected $model = Curso::class;
    
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word(),
            'nivel' => $this->faker->randomElement(array_column(NivelCursoEnum::cases(), 'value'))
        ];
    }
}
