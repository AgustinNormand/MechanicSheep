<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimacions', function (Blueprint $table) {
            $table->id('ID_ESTIMACION');
            $table->date('fecha_estimada_aviso');
            $table->float('promedio');
            $table->boolean('mail_enviado');
            $table->date('fecha_ultimo_trabajo');
            $table->boolean('activada');
            $table->boolean('ID_VEHICULO');
            $table->foreign('ID_VEHICULO')->references('ID_VEHICULO')->on('vehiculos')->onDelete('cascade');
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
        Schema::dropIfExists('estimacions');
    }
}
