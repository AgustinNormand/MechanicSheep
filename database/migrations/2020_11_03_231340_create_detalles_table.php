<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->unsignedBigInteger('ID_DETALLE');
            $table->unsignedBigInteger("ID_TRABAJO");
            $table->string("descripcion",50)->nullable();
            $table->integer("cantidad")->nullable();
            $table->primary(['ID_DETALLE','ID_TRABAJO']);
            $table->foreign('ID_TRABAJO')->references('ID_TRABAJO')->on('trabajos')->onDelete('cascade');
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
        Schema::dropIfExists('detalles');
    }
}
