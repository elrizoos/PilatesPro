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
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('dni', 9)->unique();
            $table->string('telefono', 9);
            $table->string('email')->unique();
            $table->string('direccion')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('password');
            $table->enum('tipo_usuario', ['Alumno', 'Profesor', 'Admin']);
            $table->boolean('premium')->default(false);
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
