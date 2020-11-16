<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectorEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector_empleado', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_SECTOR');
            $table->unsignedBigInteger('ID_EMPLEADO');
            $table->string('descripcion',50);
            $table->unsignedBigInteger('ID_TALLER');
            $table->primary(['ID_SECTOR','ID_EMPLEADO']);
            $table->foreign('ID_SECTOR')->references('ID_SECTOR')->on('sectors');
            $table->foreign('ID_EMPLEADO')->references('ID_EMPLEADO')->on('empleados');
            $table->foreign('ID_TALLER')->references('ID_TALLER')->on('sectors');
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
        Schema::dropIfExists('sector_empleado');
    }
}
