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
            $table->string('laboratorio');
            $table->string('regsanitario');
            $table->date('vencimiento');
            $table->date('alerta');
            $table->integer('codigo');
            $table->integer('precioventa');            
            $table->integer('preciocompra');
            $table->integer('stock');
            $table->integer('stockmin');
            $table->timestamps();
        });
    }
/**xam
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
