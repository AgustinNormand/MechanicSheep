<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoHorarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_horario', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_EMPLEADO');
            $table->unsignedBigInteger('ID_HORARIO');
            $table->string('descripcion',100);
            $table->primary(['ID_EMPLEADO','ID_HORARIO']);
            $table->foreign('ID_EMPLEADO')->references('ID_EMPLEADO')->on('empleados');
            $table->foreign('ID_HORARIO')->references('ID_HORARIO')->on('horarios');
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
        Schema::dropIfExists('empleado_horario');
    }
}
