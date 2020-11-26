<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectors', function (Blueprint $table) {
            $table->id('ID_SECTOR');
            $table->unsignedBigInteger('ID_TALLER');
            $table->string('NOMBRE',200);
            $table->string('DESCRIPCION',50)->nullable();
            $table->boolean('ESTADO');
            $table->index(['ID_TALLER','ID_SECTOR']);
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
        Schema::dropIfExists('sectors');
    }
}
