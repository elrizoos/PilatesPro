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
        Schema::table('seccion_contenidos', function (Blueprint $table) {
            $table->unsignedBigInteger('idPagina');
            $table->foreign('idPagina')->references('id')->on('paginas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign(['idPagina']);
        $table->dropColumn('idPagina');
    }
};
