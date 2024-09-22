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
        Schema::create('anamneses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade'); // Referencia correta para a tabela 'users'
            $table->foreignId('nutricionist_id')->constrained('users')->onDelete('cascade'); // Referencia correta para a tabela 'users'

            // Campos específicos da anamnese
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->text('diseases')->nullable();
            $table->string('allergies')->nullable();
            $table->string('medications')->nullable();
            $table->text('family_history')->nullable();
            $table->integer('meals_per_day')->nullable();
            $table->float('water_intake')->nullable();
            $table->enum('alcohol', ['no', 'yes'])->default('no');
            $table->enum('caffeine', ['no', 'yes'])->default('no');
            $table->enum('exercise', ['no', 'yes'])->default('no');
            $table->string('exercise_frequency')->nullable();
            $table->enum('snacks', ['no', 'yes'])->default('no');
            $table->text('diet_history')->nullable();
            $table->string('short_term_goal')->nullable();
            $table->string('long_term_goal')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anamneses');
    }
};
