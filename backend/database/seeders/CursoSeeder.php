<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    public function run(): void
    {
        Curso::factory()->create([
            'nome' => 'Análise e Desenvolvimento de Sistemas'
        ]);
    }
}
