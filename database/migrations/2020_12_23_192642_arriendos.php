<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Arriendos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arriendos', function (Blueprint $table) {
            $table->id();
            $table->string('rut_cliente');
            $table->date('fecha_recogida');
            $table->date('fecha_devolucion');
            $table->boolean('confirmada');
            $table->integer('total')->nullable();
            $table->time('hora_recepcion_cliente')->nullable();
 
            $table->datetime('fecha_recepcion_vehiculos')->nullable();
            $table->boolean('estado');//0 vigente 1 Finalizado

            $table->timestamps();
            $table->foreign('rut_cliente')->references('rut_cliente')->on('clientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return voids
     */
    public function down()
    {
        //
    }
}
