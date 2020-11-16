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
            $table->string('descripcion',200);
            $table->string('calle',200);
            $table->integer('nro_calle',200);
            $table->string('localidad',200);
            $table->string('pais',200);
            $table->string('email',200);
            $table->string('telefono',50);
            $table->boolean('estado',200);
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
