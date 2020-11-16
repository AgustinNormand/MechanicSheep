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
            $table->id("ID_TRABAJO");
            $table->date("fecha")->nullable();
            $table->string("descripcion",200)->nullable();
            $table->string("kilometraje_auto",50)->nullable();
            $table->unsignedBigInteger("ID_SERVICIO")->nullable();
            $table->unsignedBigInteger("ID_VEHICULO")->nullable();
            $table->foreign('ID_SERVICIO')->references('ID_SERVICIO')->on('servicios')->onDelete('set null');
            $table->foreign('ID_VEHICULO')->references('ID_VEHICULO')->on('vehiculos')->onDelete('cascade');;
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
