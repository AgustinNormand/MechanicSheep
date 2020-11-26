<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajoEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajo_empleado', function (Blueprint $table) {
            $table->id('ID_TRABAJO_EMPLEADO');
            $table->unsignedBigInteger('ID_TRABAJO');
            $table->unsignedBigInteger('ID_EMPLEADO');
            $table->string('DESCRIPCION',200)->nullable();
            $table->index(['ID_TRABAJO','ID_EMPLEADO']);
            $table->foreign('ID_TRABAJO')->references('ID_TRABAJO')->on('trabajos');
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
        Schema::dropIfExists('trabajo_empleado');
    }
}
