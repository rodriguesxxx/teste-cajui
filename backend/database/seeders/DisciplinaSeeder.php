<?php

namespace Database\Seeders;

use App\Models\Disciplina;
use Illuminate\Database\Seeder;

class DisciplinaSeeder extends Seeder
{
    protected $model = Disciplina::class;

    public function run(): void
    {
        Disciplina::factory(10)->create();
    }
}
