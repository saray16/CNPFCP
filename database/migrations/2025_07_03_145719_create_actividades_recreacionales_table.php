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
       Schema::create('actividades_recreacionales', function (Blueprint $table) {
    $table->id();
    $table->string('tipo'); // CURSO/TALLER/ACTIVIDAD
    $table->string('nombre');
    $table->date('fecha');
    $table->time('hora_inicio');
    $table->time('hora_fin');
    $table->integer('horas_formacion');
    $table->string('rango_edad');
    $table->string('semana');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades_recreacionales');
    }
};
