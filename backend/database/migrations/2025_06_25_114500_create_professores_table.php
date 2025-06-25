<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('professores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('siape', length: 7)->unique();
            $table->timestamps();

            $table->foreign(['user_id'])->references(['id'])->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('professores');
    }
};
