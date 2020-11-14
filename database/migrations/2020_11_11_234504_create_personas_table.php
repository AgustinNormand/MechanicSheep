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
            $table->string('Nombre', 200);
            $table->string('Apellido', 200);
            $table->string('Nro_doc', 50);
            $table->date('Fecha_nac');
            $table->string('Calle', 200);
            $table->integer('Nro_calle');
            $table->string('Localidad', 200);
            $table->string('Pais', 200);
            $table->string('Telefono', 50);
            $table->string('Email', 200);
            $table->string('Descripcion', 200);
            $table->boolean('Estado', 50);
            $table->unsignedBigInteger('ID_TIPO_DOC')->nulleable();

            $table->foreign('ID_TIPO_DOC')->references('ID_TIPO_DOC')->on('tipo_doc')->onDelete('set null');
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
