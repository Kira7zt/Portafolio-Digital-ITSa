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
        Schema::table('materias', function (Blueprint $table) {
            // Campo para el docente que dicta la materia
            $table->unsignedBigInteger('docente_id')->nullable()->after('carrera_id');
            $table->foreign('docente_id')->references('id')->on('administrativos')->onDelete('set null');

            // Campo para el año al que pertenece la materia
            $table->year('anio')->nullable()->after('codigo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('materias', function (Blueprint $table) {
            $table->dropForeign(['docente_id']);
            $table->dropColumn(['docente_id', 'anio']);
        });
    }
};
