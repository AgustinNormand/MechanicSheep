<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_usuarios', function (Blueprint $table) {
            $table->id('ID_ROL_USUARIO');
            $table->unsignedBigInteger('ID_ROL');
            $table->unsignedBigInteger('ID_USUARIO');

            $table->foreign('ID_ROL')->references('ID_ROL')->on('rols')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_USUARIO')->references('ID_USUARIO')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('rol_usuarios');
    }
}
