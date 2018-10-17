<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatproveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matprove', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_proveedores');
            $table->unsignedInteger('id_materias_primas');

            $table->foreign('id_proveedores')->references('id')->on('proveedores')->onDelete('cascade');
            $table->foreign('id_materias_primas')->references('id')->on('materias_primas')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matprove');
    }
}
