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
            $table->unsignedBigInteger('ID_TALLER');
            $table->string('DESCRIPCION',50)->nullable();
            $table->primary(['ID_SECTOR','ID_EMPLEADO','ID_TALLER']);
            
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
