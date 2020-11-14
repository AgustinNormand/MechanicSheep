<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->id('ID_MODELO');
            $table->string('nombre_fantasia',200);
            $table->string('descripcion',200);
            $table->string('cambio',50);
            $table->string('combustible',50);
            $table->integer('puertas');
            $table->integer('potencia');
            $table->unsignedBigInteger('ID_MARCA');
            $table->foreign('ID_MARCA')->references('ID_MARCA')->on('marcas')->onDelete('set null');
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
        Schema::dropIfExists('modelos');
    }
}
