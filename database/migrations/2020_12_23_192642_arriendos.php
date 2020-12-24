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
            $table->id('id_arriendo');
            $table->string('rut_cliente');
            $table->date('arriendo_fecha_inicio');
            $table->date('arriendo_fecha_final');

            $table->timestamp('created_At')->useCurrent();
            $table->foreign('rut_cliente')->references('rut_cliente')->on('cliente');
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
