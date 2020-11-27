<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_sector', function (Blueprint $table) {
            $table->id('ID_SERVICIO_SECTOR');
            $table->unsignedBigInteger('ID_SERVICIO');
            $table->unsignedBigInteger('ID_SECTOR');
            //$table->unsignedBigInteger('ID_TALLER');
            $table->index(['ID_SERVICIO','ID_SECTOR'/*,'ID_TALLER'*/]);
            $table->foreign('ID_SERVICIO')->references('ID_SERVICIO')->on('servicios');
            
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
        Schema::dropIfExists('servicio_sector');
    }
}
