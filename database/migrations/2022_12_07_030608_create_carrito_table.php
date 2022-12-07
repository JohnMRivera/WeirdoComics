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
        Schema::create('carrito', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->integer('id_articulo');
            $table->string('tipo');
            // $table->unsignedBigInteger('id_comic')->nullable();
            // $table->foreign('id_comic')->references('id_comic')->on('comics');
            // $table->unsignedBigInteger('id_articulo')->nullable();
            // $table->foreign('id_articulo')->references('id_articulo')->on('articulos');
            $table->integer('cantidad');
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
        Schema::dropIfExists('table_carrito');
    }
};
