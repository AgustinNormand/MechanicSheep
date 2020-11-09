<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajos', function (Blueprint $table) {
            $table->bigInteger("ID_TRABAJO")->primary();
            $table->text("NUMERO")->nullable();
            $table->text("FECHA")->nullable();
            $table->text("PATENTE")->nullable();
            $table->text("MODELO")->nullable();
            $table->text("APELLIDO")->nullable();
            $table->text("NOMBRE")->nullable();
            $table->text("ESTADO")->nullable();
            $table->text("DESCRIPCION")->nullable();
            $table->text("EMPLEADO")->nullable();
            $table->text("KILOMETROS")->nullable();
            $table->text("FECHA_FINALIZACION")->nullable();
            $table->text("NRO_SUCURSAL")->nullable();
            $table->text("NRO_MOVIMIENTO")->nullable();
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
        Schema::dropIfExists('trabajos');
    }
}
