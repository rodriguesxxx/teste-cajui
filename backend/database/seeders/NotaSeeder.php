<?php

namespace Database\Seeders;

use App\Models\Nota;
use Illuminate\Database\Seeder;

class NotaSeeder extends Seeder
{
    public function run(): void
    {
        Nota::factory(50)->create();
    }
}
