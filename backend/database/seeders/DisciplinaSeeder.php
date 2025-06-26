<?php

namespace Database\Seeders;

use App\Models\Disciplina;
use Illuminate\Database\Seeder;

class DisciplinaSeeder extends Seeder
{
    protected $model = Disciplina::class;

    public function run(): void
    {
        $disciplinas = [
            'Arquitetura e Organização de Computadores', 
            'Lógica Matemática', 
            'Matemática Aplicada', 
            'Programação e Algoritmos', 
            'Algoritmos e Estruturas de Dados', 
            'Banco de Dados I', 
            'Engenharia de Software', 
            'Banco de Dados II', 
            'Programação Orientada a Objetos', 
            'Programação Web I'
        ];

        foreach($disciplinas as $disciplina) {
            Disciplina::factory()->create(['nome' => $disciplina]);
        }
    }
}
