<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AlunoSeeder::class,
            ProfessorSeeder::class,
            CursoSeeder::class,
            DisciplinaSeeder::class,
            AvaliacaoSeeder::class,
            NotaSeeder::class,
            DisciplinaAlunoSeeder::class
        ]);
    }
}
