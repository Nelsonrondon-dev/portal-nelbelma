<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePedidoProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_producto', function (Blueprint $table) {
            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('inventario_id');
            $table->decimal('cantidad', 8, 2);
   
            $table->timestamps();
            $table->foreign('pedido_id')
            ->references('id')
            ->on('pedidos')
            ->onDelete('cascade');

            $table->foreign('inventario_id')
                        ->references('id_inventario')
                        ->on('inventarios')
                        ->onDelete('cascade');

          });

        
  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_pedido_producto');
    }
}
