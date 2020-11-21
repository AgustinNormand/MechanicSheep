<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSectorAndTallerToServicioSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicio_sector', function (Blueprint $table) {
            $table->foreign('ID_SECTOR')->references('ID_SECTOR')->on('sectors');
            $table->foreign('ID_TALLER')->references('ID_TALLER')->on('tallers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicio_sector', function (Blueprint $table) {
            //
        });
    }
}
