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
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade'); // Chave estrangeira para o paciente
            $table->foreignId('nutricionist_id')->constrained('users')->onDelete('cascade'); // Chave estrangeira para o nutricionista
            $table->date('antropometria_date'); // Data da avaliação
            $table->decimal('weight', 5, 2); // Peso
            $table->decimal('height', 4, 2); // Altura
            $table->decimal('bmi', 5, 2); // IMC
            $table->decimal('lean_mass', 5, 2); // Massa magra
            $table->decimal('fat_mass', 5, 2); // Massa gorda
            $table->decimal('shoulder_circumference', 5, 2); // Circunferência do ombro
            $table->decimal('chest_circumference', 5, 2); // Circunferência do peito
            $table->decimal('abdomen_circumference', 5, 2); // Circunferência do abdômen
            $table->decimal('right_arm_circumference', 5, 2); // Circunferência do braço direito
            $table->decimal('right_forearm_circumference', 5, 2); // Circunferência do antebraço direito
            $table->decimal('right_thigh_circumference', 5, 2); // Circunferência da coxa direita
            $table->decimal('right_calf_circumference', 5, 2); // Circunferência da panturrilha direita
            $table->decimal('left_arm_circumference', 5, 2); // Circunferência do braço esquerdo
            $table->decimal('left_forearm_circumference', 5, 2); // Circunferência do antebraço esquerdo
            $table->decimal('left_thigh_circumference', 5, 2); // Circunferência da coxa esquerda
            $table->decimal('left_calf_circumference', 5, 2); // Circunferência da panturrilha esquerda
            $table->decimal('skinfold_chest', 5, 2); // Dobra cutânea no peito
            $table->decimal('skinfold_axillary', 5, 2); // Dobra cutânea axilar
            $table->decimal('skinfold_suprailiac', 5, 2); // Dobra cutânea supra-ilíaca
            $table->decimal('skinfold_abdominal', 5, 2); // Dobra cutânea abdominal
            $table->decimal('skinfold_thigh', 5, 2); // Dobra cutânea na coxa
            $table->decimal('skinfold_calves', 5, 2); // Dobra cutânea nas panturrilhas
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
