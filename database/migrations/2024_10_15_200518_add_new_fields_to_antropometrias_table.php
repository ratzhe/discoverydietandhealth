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
            $table->float('skinfold_tricep')->nullable()->after('skinfold_calves');
            $table->float('skinfold_subscapular')->nullable()->after('skinfold_tricep');
            $table->float('waist_circumference')->nullable()->after('abdomen_circumference');
            $table->float('hip_circumference')->nullable()->after('waist_circumference');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('antropometrias', function (Blueprint $table) {
            $table->dropColumn('skinfold_tricep');
            $table->dropColumn('skinfold_subscapular');
            $table->dropColumn('waist_circumference');
            $table->dropColumn('hip_circumference');
        });
    }
};
