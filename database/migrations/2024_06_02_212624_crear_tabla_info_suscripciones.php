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
        Schema::create('info_suscripciones', function(Blueprint $table){
            $table->id();
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->integer('clases_semanales')->nullable();
            $table->integer('tiempo_clase')->nullable();
            $table->enum('asesoramiento', ['inicial', 'mensual', 'semanal'])->nullable();
            $table->integer('dias_cancelacion')->nullable();
            $table->boolean('beneficios')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_suscripciones');

    }
};
