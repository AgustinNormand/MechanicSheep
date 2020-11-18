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
            $table->string('NOMBRE',200);
            $table->string('DESCRIPCION',200)->nullable();
            $table->string('CALLE',200)->nullable();
            $table->integer('NRO_CALLE')->nullable();
            $table->string('LOCALIDAD',200)->nullable();
            $table->string('PAIS',200)->nullable();
            $table->string('EMAIL',200)->nullable();
            $table->string('TELEFONO',50)->nullable();
            $table->boolean('ESTADO');
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
