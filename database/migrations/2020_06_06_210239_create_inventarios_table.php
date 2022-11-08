<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->bigIncrements('id-inventario');
           $table->string('nombre-producto', 100);
           $table->string('descripcion-producto');
           $table->decimal('cantidad-comprada', 8, 2);
           $table->decimal('cantidad-actual', 8, 2);
           $table->string('unidad', 100);
           $table->decimal('precio-unidad', 8, 2);
           $table->boolean('iva');
           $table->decimal('total-comprado', 8, 2);
           $table->decimal('total-neto', 8, 2);
           $table->boolean('pago');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventarios');
    }
}
