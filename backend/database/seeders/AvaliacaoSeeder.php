<?php

namespace Database\Seeders;

use App\Models\Avaliacao;
use App\Models\Disciplina;
use Illuminate\Database\Seeder;

class AvaliacaoSeeder extends Seeder
{
    public function run(): void
    {
        Disciplina::all()->each(function ($disciplina) {
            Avaliacao::factory(3)->create([
                'disciplina_id' => $disciplina->id,
            ]);
        });
    }
}
