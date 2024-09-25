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
            $table->date('antropometria_date')->nullable()->after('nutricionist_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('antropometrias', function (Blueprint $table) {
            $table->dropColumn('antropometria_date');
        });
    }
};
