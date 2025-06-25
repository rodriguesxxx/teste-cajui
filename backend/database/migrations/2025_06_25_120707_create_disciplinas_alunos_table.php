<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('disciplinas_alunos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('disciplina_id');
            $table->unsignedBigInteger(column: 'aluno_id');
            $table->tinyInteger(column: 'periodo');
            $table->date(column: 'data_inicio');
            $table->date(column: 'data_fim');
            $table->boolean('is_aprovado')->default(false);
            $table->timestamps();

            $table->foreign(['disciplina_id'])->references(['id'])->on('disciplinas');
            $table->foreign(['aluno_id'])->references(['id'])->on('alunos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('disciplinas_alunos');
    }
};
