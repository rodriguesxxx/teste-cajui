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
            'name' => 'Daniel Rodrigues',
            'email' => 'drp6@aluno.ifnmg.edu.br',
            'password' => Hash::make('aluno@cajui')
        ]);

        User::factory()->create([
            'name' => 'Alan T. Oliveira',
            'email' => 'alan.oliveira@ifnmg.edu.br',
            'password' => Hash::make('prof@cajui')
        ]);

        User::factory()->create([
            'name' => 'Marco Aurelio',
        ]);

        User::factory()->create([
            'name' => 'Leonan Teixeira de Oliveira',
        ]);

        User::factory()->create([
            'name' => 'Marcos Vinicius Montanari',
        ]);

        User::factory()->create([
            'name' => 'Marcos Vinicius Montanari',
        ]);

        User::factory()->create([
            'name' => 'Suzana Viana Mota',
        ]);
    }
}
