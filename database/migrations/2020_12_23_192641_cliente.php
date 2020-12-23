<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->string('rut_cliente');
            $table->string('nombre_cliente');
            $table->string('fono_cliente');
            $table->boolean('entrega_pendiente');
            $table->timestamp('created_At')->useCurrent();
            $table->primary('rut_cliente');

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