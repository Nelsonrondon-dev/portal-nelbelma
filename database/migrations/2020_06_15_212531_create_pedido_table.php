<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->bigIncrements('id');
            $table->string('nombre_producto');
            $table->decimal('cantidad',8, 2);
            $table->decimal('precio_und',11, 2);
            $table->decimal('total',11, 2);
            $table->boolean('despachado');
            $table->boolean('pagado');
            $table->timestamps();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
          });
  
          Schema::create('pago', function (Blueprint $table) {
              $table->unsignedBigInteger('pedido_id');
              $table->bigIncrements('id');
              $table->string('banco');
              $table->decimal('monto',11, 2);
              $table->decimal('referencia');
              $table->string('tipo_pago');
              $table->string('capture');

              $table->timestamps();
  
              $table->foreign('pedido_id')
              ->references('id')
              ->on('pedido')
              ->onDelete('cascade');
  
             
              
            });

            Schema::create('factura', function (Blueprint $table) {
                $table->unsignedBigInteger('pedido_id');
                $table->unsignedBigInteger('pago_id');
                $table->decimal('total',11, 2);
               
                $table->timestamps();
                $table->foreign('pago_id')
                ->references('id')
                ->on('pago')
                ->onDelete('cascade');

                $table->foreign('pedido_id')
                ->references('id')
                ->on('pedido')
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
        Schema::dropIfExists('pedido');
    }
}
