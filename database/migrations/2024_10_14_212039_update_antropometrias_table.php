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
        Schema::table('antropometrias', function (Blueprint $table) {
            //$table->date('antropometria_date')->nullable(); // Data da avaliação
            //$table->decimal('bmi', 5, 2)->nullable(); // IMC
            $table->decimal('lean_mass', 5, 2)->nullable(); // Massa magra
            $table->decimal('fat_mass', 5, 2)->nullable(); // Massa gorda
            $table->decimal('shoulder_circumference', 5, 2)->nullable(); // Circunferência dos ombros
            $table->decimal('chest_circumference', 5, 2)->nullable(); // Circunferência do peitoral
            $table->decimal('abdomen_circumference', 5, 2)->nullable(); // Circunferência do abdômen
            $table->decimal('right_arm_circumference', 5, 2)->nullable(); // Circunferência do braço direito
            $table->decimal('right_forearm_circumference', 5, 2)->nullable(); // Circunferência do antebraço direito
            $table->decimal('right_thigh_circumference', 5, 2)->nullable(); // Circunferência da coxa direita
            $table->decimal('right_calf_circumference', 5, 2)->nullable(); // Circunferência da panturrilha direita
            $table->decimal('left_arm_circumference', 5, 2)->nullable(); // Circunferência do braço esquerdo
            $table->decimal('left_forearm_circumference', 5, 2)->nullable(); // Circunferência do antebraço esquerdo
            $table->decimal('left_thigh_circumference', 5, 2)->nullable(); // Circunferência da coxa esquerda
            $table->decimal('left_calf_circumference', 5, 2)->nullable(); // Circunferência da panturrilha esquerda
            $table->decimal('skinfold_chest', 5, 2)->nullable(); // Dobra cutânea do peitoral
            $table->decimal('skinfold_axillary', 5, 2)->nullable(); // Dobra cutânea axilar média
            $table->decimal('skinfold_suprailiac', 5, 2)->nullable(); // Dobra cutânea supra-ilíaca
            $table->decimal('skinfold_abdominal', 5, 2)->nullable(); // Dobra cutânea abdominal
            $table->decimal('skinfold_thigh', 5, 2)->nullable(); // Dobra cutânea da coxa
            $table->decimal('skinfold_calves', 5, 2)->nullable(); // Dobra cutânea da panturrilha
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('antropometrias', function (Blueprint $table) {
            $table->dropColumn([
                //'antropometria_date',
                //'bmi',
                'lean_mass',
                'fat_mass',
                'shoulder_circumference',
                'chest_circumference',
                'abdomen_circumference',
                'right_arm_circumference',
                'right_forearm_circumference',
                'right_thigh_circumference',
                'right_calf_circumference',
                'left_arm_circumference',
                'left_forearm_circumference',
                'left_thigh_circumference',
                'left_calf_circumference',
                'skinfold_chest',
                'skinfold_axillary',
                'skinfold_suprailiac',
                'skinfold_abdominal',
                'skinfold_thigh',
                'skinfold_calves',
            ]);
        });
    }

};
