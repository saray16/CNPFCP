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
    Schema::table('formaciones', function (Blueprint $table) {
        $table->unsignedBigInteger('facilitador_id')->nullable()->after('disponible_hoy');
        $table->foreign('facilitador_id')->references('id')->on('users')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('formaciones', function (Blueprint $table) {
        $table->dropForeign(['facilitador_id']);
        $table->dropColumn('facilitador_id');
        $table->string('facilitador')->nullable();
    });
}
};
