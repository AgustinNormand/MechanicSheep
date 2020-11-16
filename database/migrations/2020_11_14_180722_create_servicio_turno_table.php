<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioTurnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_turno', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_SERVICIO');
            $table->unsignedBigInteger('ID_TURNO_P');
            $table->string('observaciones',300)->nullable();
            $table->primary(['ID_SERVICIO','ID_TURNO_P']);
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
        Schema::dropIfExists('servicio_turno');
    }
}
