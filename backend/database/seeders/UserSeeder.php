<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Daniel Professor',
            'email' => 'professor@ifnmg.edu.br',
            'password' => Hash::make('professor@cajui')
        ]);

        User::factory()->create([
            'name' => 'Daniel Aluno',
            'email' => 'daniel@aluno.ifnmg.edu.br',
            'password' => Hash::make('aluno@cajui')
        ]);
    }
}
