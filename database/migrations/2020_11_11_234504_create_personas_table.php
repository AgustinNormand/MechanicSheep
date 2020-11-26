<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id('ID_PERSONA');
            $table->string('NOMBRE', 200)->nullable();
            $table->string('APELLIDO', 200)->nullable();
            $table->string('NRO_DOC', 50)->nullable();
            $table->date('FECHA_NAC')->nullable();
            $table->string('CALLE', 200)->nullable();
            $table->integer('NRO_CALLE')->nullable();
            $table->string('LOCALIDAD', 200)->nullable();
            $table->string('PAIS', 200)->nullable();
            $table->string('TELEFONO', 50)->nullable();
            $table->string('EMAIL', 200)->nullable();
            $table->string('DESCRIPCION', 200)->nullable();
            $table->string('CODIGO_POSTAL', 10)->nullable();
            $table->boolean('ESTADO', 50)->default(1);
            $table->unsignedBigInteger('ID_TIPO_DOC')->default(1);
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
        Schema::dropIfExists('personas');
    }
}
