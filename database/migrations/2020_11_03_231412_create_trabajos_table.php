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
            $table->unsignedBigInteger("NRO_TRABAJO")->nullable();
            $table->date("FECHA")->nullable();
            $table->string("DESCRIPCION",200)->nullable();
            $table->string("KILOMETROS",50)->nullable();
            $table->boolean("DUPLICATED")->default(0);
            $table->unsignedBigInteger("ID_SERVICIO")->nullable();
            $table->unsignedBigInteger("ID_VEHICULO")->nullable();
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
