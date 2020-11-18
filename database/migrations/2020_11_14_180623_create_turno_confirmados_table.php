<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnoConfirmadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turno_confirmados', function (Blueprint $table) {
            $table->id('ID_TURNO_C');
            $table->dateTime('FECHA_HORA');
            $table->unsignedBigInteger('ID_TURNO_P');
            $table->boolean('ESTADO');

            $table->foreign('ID_TURNO_P')->references('ID_TURNO_P')->on('turno_pendientes');
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
        Schema::dropIfExists('turno_confirmados');
    }
}
