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
            $table->unsignedBigInteger('arriendo_id');
            $table->unsignedBigInteger('vehiculo_id');
            
            $table->boolean('entregado');
            $table->string('foto_arriendo')->nullable();
            $table->string('foto_entrega')->nullable();

            $table->primary(['vehiculo_id','arriendo_id']);

            $table->foreign('arriendo_id')->references('id')->on('arriendos');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
            
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
