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
            $table->string('NOMBRE',200);
            $table->string('APELLIDO',200);
            $table->date('FECHA_INICIO_ACT')->nullable();
            $table->date('FECHA_NAC')->nullable();
            $table->string('TELEFONO',50)->nullable();
            $table->string('CORREO',200)->nullable();
            $table->unsignedBigInteger('ID_TIPOEMPLEADO');
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
