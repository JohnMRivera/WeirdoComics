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
        Schema::create('comics', function (Blueprint $table) {
            $table->id('id_comic');
            $table->unsignedBigInteger('id_pedido')->nullable();
            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos');
            $table->unsignedBigInteger('id_venta')->nullable();
            $table->foreign('id_venta')->references('id_venta')->on('ventas_mostrador');
            $table->string('nombre_comic');
            $table->string('edicion');
            $table->string('compañia');
            $table->integer('cantidad_comics');
            $table->binary('imagen');
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
        Schema::dropIfExists('comics');
    }
};
