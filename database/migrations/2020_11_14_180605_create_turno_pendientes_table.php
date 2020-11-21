<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnoPendientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turno_pendientes', function (Blueprint $table) {
            $table->id('ID_TURNO_P');
            $table->date('FECHA_SOLICITUD');
            $table->string('COMENTARIOS',300)->nullable();
            $table->boolean('ESTADO');
            $table->unsignedBigInteger('ID_USUARIO');
            $table->unsignedBigInteger('ID_VEHICULO');

            $table->foreign('ID_USUARIO')->references('ID_USUARIO')->on('users');
            $table->foreign('ID_VEHICULO')->references('ID_VEHICULO')->on('vehiculos');
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
        Schema::dropIfExists('turno_pendientes');
    }
}
