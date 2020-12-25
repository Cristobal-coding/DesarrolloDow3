<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vehiculos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id('id_vehiculo');
            $table->string('nombre_vehiculo');
            $table->string('marca');
            $table->string('nombre_tipo');
            $table->string('estado');
            $table->string('patente');
            $table->string('foto');
            $table->integer('year');
            $table->timestamp('created_At')->useCurrent();
            $table->foreign('nombre_tipo')->references('nombre_tipo')->on('tipo_vehiculo');
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
