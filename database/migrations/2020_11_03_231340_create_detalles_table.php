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
            $table->bigInteger('ID_DETALLE')->primary();
            $table->text("CODIGO")->nullable();
            $table->text("DESCRIPCION")->nullable();
            $table->text("CANTIDAD")->nullable();
            $table->text("NUMERO_TRABAJO")->nullable();
            $table->text("SUCURSAL")->nullable();
            $table->text("APELLIDO_CLIENTE")->nullable();
            $table->text("NOMBRE_CLIENTE")->nullable();
            $table->text("PATENTE")->nullable();
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
