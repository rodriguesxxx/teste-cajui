<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('avaliacao_id');
            $table->decimal('nota');

            $table->timestamps();

            $table->foreign(['aluno_id'])->references(['id'])->on('alunos');
            $table->foreign(['avaliacao_id'])->references(['id'])->on('avaliacoes');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
