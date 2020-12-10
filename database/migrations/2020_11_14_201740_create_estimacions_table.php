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
            $table->date('FECHA_ESTIMADA_AVISO');
            $table->float('PROMEDIO');
            $table->boolean('MAIL_ENVIADO')->default(0);
            $table->boolean('PENDIENTE_ENVIO')->default(0);
            $table->date('FECHA_ULTIMO_TRABAJO');
            $table->boolean('ACTIVADA')->default(1);
            $table->unsignedBigInteger('ID_VEHICULO');
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
