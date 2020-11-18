<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSectorAndEmpleadoAndTallerToSectorEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sector_empleado', function (Blueprint $table) {
            $table->foreign(['ID_SECTOR', 'ID_TALLER'])->references(['ID_SECTOR', 'ID_TALLER'])->on('sectors');
            $table->foreign('ID_EMPLEADO')->references('ID_EMPLEADO')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sector_empleado', function (Blueprint $table) {
            //
        });
    }
}
