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
        Schema::table('exams', function (Blueprint $table) {
            $table->string('exam_name')->after('file_name'); // Adiciona a coluna 'exam_name' após 'file_name'
            $table->date('date')->after('exam_name'); // Adiciona a coluna 'date' após 'exam_name'
            $table->string('description')->after('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->dropColumn(['exam_name', 'date', 'description']); // Remove as colunas 'exam_name' e 'date'
        });
    }
};
