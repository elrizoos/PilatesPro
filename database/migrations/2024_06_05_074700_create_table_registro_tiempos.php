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
        Schema::create('registro_tiempos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('clases_totales')->default(0);
            $table->integer('clases_45')->default(0);
            $table->integer('clases_60')->default(0);
            $table->integer('clases_120')->default(0);
            $table->integer('minutos_totales')->default(0);
            $table->integer('clases_disfrutadas')->default(0);
            $table->integer('tiempo_disfrutado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_tiempos');
    }
};
