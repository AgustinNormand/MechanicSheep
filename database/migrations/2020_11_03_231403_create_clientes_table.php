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
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigInteger("ID_CLIENTE")->primary('');
            $table->text("DNI")->nullable();
            $table->text("NOMBRE")->nullable();
            $table->text("APELLIDO")->nullable();
            $table->text("DIRECCION")->nullable();
            $table->text("LOCALIDAD")->nullable();
            $table->text("TELEFONO")->nullable();
            $table->text("CODIGO_POSTAL")->nullable();
            $table->text("BARRIO")->nullable();
            $table->text("EMAIL")->nullable();
            $table->text("CUIT")->nullable();
            $table->text("CONDICION_IVA")->nullable();
            $table->text("EMPRESA")->nullable();
            $table->text("OTROS_DATOS")->nullable();
            $table->text("CODIGO")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
