<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajoEmpleadoSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajo_empleado_sector', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_TRABAJO');
            $table->unsignedBigInteger('ID_EMPLEADO');
            $table->unsignedBigInteger('ID_SECTOR');
            $table->string('observaciones',200);
            $table->primary(['ID_TRABAJO','ID_EMPLEADO','ID_SECTOR']);
            $table->foreign('ID_TRABAJO')->references('ID_TRABAJO')->on('trabajo_empleado');
            $table->foreign('ID_EMPLEADO')->references('ID_EMPLEADO')->on('trabajo_empleado');
            $table->foreign('ID_SECTOR')->references('ID_SECTOR')->on('sector_empleado');
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
        Schema::dropIfExists('trabajo_empleado_sector');
    }
}
