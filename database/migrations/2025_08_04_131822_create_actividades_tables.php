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
        // Tabla principal de actividades
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Ej: "Ajedrez", "El cuento en los aprendizajes..."
            $table->string('grupo'); // "Grupo 1", "Grupo 2"
            $table->string('facilitador');
            $table->string('edad_rango'); // "9 a 11 años"
            $table->string('duracion'); // "26 horas"
            $table->string('dias'); // "Lunes y miércoles"
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('horario'); // "10:00 a 13:30"
            $table->text('descripcion')->nullable();
            $table->string('estado')->default('activo'); // activo/inactivo/completado
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabla de participantes
        Schema::create('participantes_actividades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actividad_id')->constrained('actividades')->onDelete('cascade');
            $table->string('nombre_completo');
            $table->string('cedula');
            $table->integer('edad');
            $table->string('representante')->nullable();
            $table->string('contacto')->nullable();
            $table->string('parentesco')->nullable();
            $table->json('asistencias')->nullable(); // {fecha: bool_asistencia}
            $table->json('evaluaciones')->nullable(); // {concepto: valor}
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Tabla de sesiones (opcional para mejor control)
        Schema::create('sesiones_actividades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actividad_id')->constrained('actividades')->onDelete('cascade');
            $table->date('fecha');
            $table->string('horario');
            $table->string('tema')->nullable();
            $table->text('contenido')->nullable();
            $table->text('materiales')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesiones_actividades');
        Schema::dropIfExists('participantes_actividades');
        Schema::dropIfExists('actividades');
    }
};