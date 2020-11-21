<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisoRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_rol', function (Blueprint $table) {
            $table->id('ID_PERMISO_ROL');
            $table->unsignedBigInteger('ID_PERMISO');
            $table->unsignedBigInteger('ID_ROL');

            $table->foreign('ID_PERMISO')->references('ID_PERMISO')->on('permisos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_ROL')->references('ID_ROL')->on('rols')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('permiso_rol');
    }
}
