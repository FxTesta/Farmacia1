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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('categoria');
            $table->string('descripcion');
            $table->string('marca');
            $table->string('venta');
            $table->string('laboratorio')->nullable();
            $table->string('regsanitario');
            $table->date('vencimiento');
            $table->date('alerta');
            $table->integer('codigo');
            $table->integer('precioventa');            
            $table->integer('preciocompra');
            $table->integer('stock');
            $table->integer('stockmin')->nullable();
            $table->string('descuento')->nullable();
            $table->string('presentacion')->nullable();
            $table->string('estante')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
