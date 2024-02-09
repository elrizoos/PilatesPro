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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('apellidos', 255);
            $table->string('dni', 9)->unique();
            $table->string('telefono', 9);
            $table->string('email', 255)->unique();
            $table->string('direccion', 255);
            $table->date('fecha_nacimiento');
            $table->string('password');
            $table->enum('tipo_usuario', ['Alumno' , 'Profesor'])->nullable();
            $table->string('especializacion', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
