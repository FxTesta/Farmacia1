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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa');
            $table->string('name');
            $table->string('ruc');
            $table->bigInteger('dv')->nullable();
            $table->string('direccion');
            $table->string('barrio')->nullable();
            $table->string('callelateral')->nullable();
            $table->string('referencia')->nullable();
            $table->bigInteger('telefono');
            $table->string('email')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
