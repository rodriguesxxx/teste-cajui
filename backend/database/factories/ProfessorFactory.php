<?php

namespace Database\Factories;

use App\Models\Professor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessorFactory extends Factory
{
    protected $model = Professor::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'siape' => $this->faker->unique()->numerify('#######'),
        ];
    }
}
