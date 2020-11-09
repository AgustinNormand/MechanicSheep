<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->bigInteger("ID_VEHICULO")->primary();
            $table->text("PATENTE")->nullable();
            $table->text("APELLIDO")->nullable();
            $table->text("NOMBRE")->nullable();
            $table->text("MARCA")->nullable();
            $table->text("ANO")->nullable();
            $table->text("NUMERO_MOTOR")->nullable();
            $table->text("VIN")->nullable();
            $table->text("CODIGO_STEREO")->nullable();
            $table->text("CODIGO_LLAVE")->nullable();
            $table->text("CAB_LLAVE")->nullable();
            $table->text("FECHA_COMPRA")->nullable();
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
        Schema::dropIfExists('vehiculos');
    }
}
