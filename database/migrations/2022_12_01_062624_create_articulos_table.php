<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id('id_articulo');
            $table->unsignedBigInteger('id_pedido')->nullable();
            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos');
            $table->unsignedBigInteger('id_venta')->nullable();
            $table->foreign('id_venta')->references('id_venta')->on('ventas_mostrador');
            $table->string('tipo');
            $table->string('marca');
            $table->string('descripcion');
            $table->integer('cantidad_articulos');
            $table->integer('precio_compra');
            $table->integer('precio_venta');
            $table->date('fecha');
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
        Schema::dropIfExists('articulos');
    }
};
