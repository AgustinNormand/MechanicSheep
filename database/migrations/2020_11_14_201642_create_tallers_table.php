<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tallers', function (Blueprint $table) {
            $table->id('ID_TALLER');
            $table->string('nombre',200);
            $table->string('descripcion',200)->nulleable();
            $table->string('calle',200)->nulleable();
            $table->integer('nro_calle')->nulleable();
            $table->string('localidad',200)->nulleable();
            $table->string('pais',200)->nulleable();
            $table->string('email',200)->nulleable();
            $table->string('telefono',50)->nulleable();
            $table->boolean('estado');
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
        Schema::dropIfExists('tallers');
    }
}
