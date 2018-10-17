<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_producto');
            $table->unsignedInteger('id_cliente');
            $table->integer('cantidad');
            $table->unsignedInteger('estado');
            $table->timestamps();

            $table->foreign('id_producto')->references('id')->on('producto')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
