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
        Schema::table('metodos_recuperaciones', function(Blueprint $table){
            $table->string('pregunta')->nullable();
            $table->string('respuesta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('metodos_recuperaciones', function (Blueprint $table) {
            $table->dropColumn('pregunta');
            $table->dropColumn('respuesta');
        });
    }
};
