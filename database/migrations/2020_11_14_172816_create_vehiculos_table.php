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
            $table->id('ID_VEHICULO');
            $table->string('patente',10);
            $table->string('vin',100);
            $table->string('anio',10);
            $table->string('nro_motor',100);
            $table->unsignedBigInteger('ID_MODELO');
            $table->unsignedBigInteger('ID_PERSONA');
            $table->foreign('ID_MODELO')->references('ID_MODELO')->on('modelos')->onDelete('set null');
            $table->foreign('ID_PERSONA')->references('ID_PERSONA')->on('personas')->onDelete('set null');
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
