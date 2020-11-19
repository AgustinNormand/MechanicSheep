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
            $table->string('PATENTE',10);
            $table->string('VIN',100)->nullable();;
            $table->string('ANIO',10)->nullable();
            $table->string('NUMERO_MOTOR',100);
            $table->unsignedBigInteger('ID_MODELO')->nullable();
            $table->unsignedBigInteger('ID_PERSONA');
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
