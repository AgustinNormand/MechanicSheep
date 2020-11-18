<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSectorAndEmpleadoToTrabajoEmpleadoSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trabajo_empleado_sector', function (Blueprint $table) {
            $table->foreign('ID_EMPLEADO')->references('ID_EMPLEADO')->on('trabajo_empleado');
            $table->foreign('ID_SECTOR')->references('ID_SECTOR')->on('sector_empleado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trabajo_empleado_sector', function (Blueprint $table) {
            //
        });
    }
}
