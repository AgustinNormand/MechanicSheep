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
            $table->string('NOMBRE_FANTASIA',200);
            $table->string('DESCRIPCION',200)->nullable();
            $table->string('CAMBIO',50)->nullable();
            $table->string('COMBUSTIBLE',50)->nullable();
            $table->integer('PUERTAS')->nullable();
            $table->integer('POTENCIA')->nullable();
            $table->unsignedBigInteger('ID_MARCA')->nullable();
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
