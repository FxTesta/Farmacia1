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
            $table->string('name');
            $table->string('description');
            $table->date('vencimiento');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->integer('stock');
            $table->timestamps();
        });
    }
/**
*Nombre del medicamento
*Código de barras o código de producto
*Número de registro sanitario
*Composición y dosis del medicamento
*Forma farmacéutica (tabletas, cápsulas, inyectables, etc.)
*Vía de administración (oral, tópica, intravenosa, etc.)
*Presentación (envase, tamaño, cantidad)
*Fecha de caducidad y lote
*Proveedor del medicamento
*Precio de compra y venta
*Stock disponible y mínimo requerido
*Ubicación del medicamento en la farmacia o almacén
*Historial de movimientos y ventas del medicamento
*Información adicional, como restricciones de uso o precauciones especiales.
 * 
 */
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
