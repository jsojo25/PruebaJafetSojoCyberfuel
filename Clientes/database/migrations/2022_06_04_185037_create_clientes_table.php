<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_datos', function (Blueprint $table) {
            $table->string('Identificacion')->primary('Identificacion');
            $table->string('Nombre');
            $table->string('Apellido1');
            $table->string('Apellido2');
            $table->mediumText('CorreoContacto');
            $table->string('Telefono');
        });

        Schema::create('catalogo_direcciones', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Tipo_Direccion');
        });

        Schema::create('clientes_direcciones', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Identificacion');
            $table->mediumText('Direccion');
            $table->integer('Tipo_Direccion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes_datos');
        Schema::dropIfExists('catalogo_direcciones');
        Schema::dropIfExists('clientes_direcciones');
    }
}
