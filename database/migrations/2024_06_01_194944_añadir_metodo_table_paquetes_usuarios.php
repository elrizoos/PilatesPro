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
        Schema::rename('table_paquetes_usuarios', 'paquetes_usuarios');
        Schema::table('paquetes_usuarios', function(Blueprint $table){
            $table->string('payment_method_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('paquetes_usuarios', 'table_paquetes_usuarios');
        Schema::table('table_paquetes_usuarios', function (Blueprint $table) {
            $table->dropColumn('payment_method_id');
        });
    }
};
