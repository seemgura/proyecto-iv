
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
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();

            // Relación con el pedido
            $table->foreignId('pedido_id')
                ->constrained('pedidos')
                ->cascadeOnDelete();

            // Relación con el producto
            $table->foreignId('producto_id')
                ->constrained('productos')
                ->restrictOnDelete();

            // Cantidad de unidades compradas
            $table->unsignedInteger('cantidad');

            // Precio del producto al momento de la compra
            $table->decimal('precio_unitario', 10, 2);

            // Importe total de este producto
            $table->decimal('subtotal', 10, 2);

            // Fechas de creación y actualización
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_pedidos');
    }
};
