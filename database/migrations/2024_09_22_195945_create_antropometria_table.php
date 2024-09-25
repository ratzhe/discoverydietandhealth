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
        Schema::create('antropometrias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('nutricionist_id')->constrained('users')->onDelete('cascade');
            $table->decimal('weight', 5, 2); // Peso em kg
            $table->decimal('height', 5, 2); // Altura em cm
            $table->decimal('waist_circumference', 5, 2)->nullable(); // Circunferência da cintura
            $table->decimal('hip_circumference', 5, 2)->nullable(); // Circunferência do quadril
            $table->decimal('skinfold_tricep', 5, 2)->nullable(); // Dobro cutâneo do tríceps
            $table->decimal('skinfold_subscapular', 5, 2)->nullable(); // Dobro cutâneo subescapular
            // Adicione outros campos conforme necessário
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antropometrias');
    }
};
