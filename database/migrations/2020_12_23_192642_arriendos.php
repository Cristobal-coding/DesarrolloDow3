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
            $table->date('arriendo_fecha_inicio');
            $table->date('arriendo_fecha_final');
            $table->boolean('confirmada')->nullable();

            $table->timestamps();
            $table->foreign('rut_cliente')->references('rut_cliente')->on('clientes');
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
