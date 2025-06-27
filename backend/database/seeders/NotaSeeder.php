<?php

namespace Database\Seeders;

use App\Models\Avaliacao;
use App\Models\Nota;
use App\Models\User;
use Illuminate\Database\Seeder;

class NotaSeeder extends Seeder
{
    public function run(): void
    {
        $aluno = User::first()->aluno();

        Avaliacao::all()->each(function ($avaliacao) use ($aluno) {
            Nota::factory(3)->create([
                'avaliacao_id' => $avaliacao->id,
                'aluno_id' => $aluno->id,
            ]);
        });
    }
}
