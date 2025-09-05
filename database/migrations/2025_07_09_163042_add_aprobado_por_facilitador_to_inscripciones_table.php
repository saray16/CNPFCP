<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('inscripciones', function (Blueprint $table) {
        $table->boolean('aprobado_por_facilitador')->nullable()->after('formacion_id');
        $table->timestamp('fecha_aprobacion')->nullable()->after('aprobado_por_facilitador');
        $table->foreignId('facilitador_id')->nullable()->after('fecha_aprobacion')->constrained('users');
    });
}

public function down()
{
    Schema::table('inscripciones', function (Blueprint $table) {
        $table->dropColumn(['aprobado_por_facilitador', 'fecha_aprobacion', 'facilitador_id']);
    });
}
};
