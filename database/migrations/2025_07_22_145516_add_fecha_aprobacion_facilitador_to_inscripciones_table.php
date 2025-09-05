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
        $table->timestamp('fecha_aprobacion_facilitador')->nullable()->after('aprobado_por_facilitador');
    });
}

public function down()
{
    Schema::table('inscripciones', function (Blueprint $table) {
        $table->dropColumn('fecha_aprobacion_facilitador');
    });
}

};
