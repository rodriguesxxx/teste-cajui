<?php

namespace Database\Seeders;

use App\Models\Professor;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProfessorSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::query()->orderBy('id')->get()->slice(1);

        foreach ($users as $user) {
            Professor::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
