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
        $table->dropColumn('facilitador');
        $table->foreignId('facilitador_id')->nullable()->constrained('users');
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
