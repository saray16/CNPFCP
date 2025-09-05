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
    $table->string('espacio');
     $table->string('horario'); 
    $table->date('fecha');
    $table->time('fecha_inicio');
    $table->time('fecha_fin');
    $table->integer('horas_formacion');
    $table->string('edades');
    $table->string('semana');
    $table->boolean('cupo_completo')->default(false);
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
