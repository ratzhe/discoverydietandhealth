<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laboratory_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relacionado ao usuário que fez o exame
            $table->string('test_type'); // Tipo do exame (hemograma, glicose, etc.)
            $table->json('results'); // Resultados dos exames
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratory_tests');
    }
};
