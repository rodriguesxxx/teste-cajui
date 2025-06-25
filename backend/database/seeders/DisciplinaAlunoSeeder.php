<?php

namespace Database\Seeders;

use App\Models\DisciplinaAluno;
use Illuminate\Database\Seeder;

class DisciplinaAlunoSeeder extends Seeder
{
    public function run(): void
    {
        DisciplinaAluno::factory(30)->create();
    }
}
