<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArriendoVehiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arriendo_vehiculo', function (Blueprint $table) {
            $table->unsignedBigInteger("id_arriendo");
            $table->unsignedBigInteger("id_vehiculo");
            $table->boolean('entregado');
            $table->string('foto_arriendo');
            $table->string('foto_entrega');

            $table->primary(['id_arriendo','id_vehiculo']);

            $table->foreign('id_arriendo')->references('id_arriendo')->on('arriendos');
            $table->foreign('id_vehiculo')->references('id_vehiculo')->on('vehiculos');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
