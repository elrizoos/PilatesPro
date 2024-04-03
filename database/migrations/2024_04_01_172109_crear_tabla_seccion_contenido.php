<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seccion_contenidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idSeccion');
            $table->string('titulo', 255);
            $table->string('parrafo', 255);
            $table->unsignedBigInteger('idImagenUno');
            $table->unsignedBigInteger('idImagenDos')->nullable();
            $table->foreign('idSeccion')->references('id')->on('seccions')->onDelete('cascade');
            $table->foreign('idImagenUno')->references('id')->on('imagenes_seccions')->onDelete('cascade');
            $table->foreign('idImagenDos')->references('id')->on('imagenes_seccions')->onDelete('cascade');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
