<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrefHoraTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pref_hora_turnos', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_PREF');
            $table->unsignedBigInteger('ID_TURNO_P');
            $table->string('Dia',15);
            $table->string('Hora',15);
            $table->primary(['ID_PREF','ID_TURNO_P']);
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
        Schema::dropIfExists('pref_hora_turnos');
    }
}
