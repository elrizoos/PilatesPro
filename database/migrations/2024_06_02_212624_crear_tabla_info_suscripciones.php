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
            $table->enum('tiempo_clase', ['45', '60', '120'])->nullable();
            $table->enum('asesoramiento', ['inicial', 'mensual', 'semanal'])->nullable();
            $table->integer('dias_cancelacion')->nullable();
            $table->boolean('beneficios')->default(false);
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
