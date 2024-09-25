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
            $table->decimal('bmi', 5, 2)->nullable(); // IMC
            $table->decimal('body_fat', 5, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('antropometrias', function (Blueprint $table) {
            $table->dropColumn('bmi');
            $table->dropColumn('body_fat');
        });
    }
};
