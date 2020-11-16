<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('ID_EMPLEADO');
            $table->string('nombre',200);
            $table->string('apellido',200);
            $table->date('fecha_inicio_act');
            $table->date('fecha_nac');
            $table->string('telefono',50);
            $table->string('correo',200);
            $table->unsignedBigInteger('ID_TIPOEMPLEADO');
            $table->foreign('ID_TIPOEMPLEADO')->references('ID_TIPOEMPLEADO')->on('tipo_empleados');
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
        Schema::dropIfExists('empleados');
    }
}
