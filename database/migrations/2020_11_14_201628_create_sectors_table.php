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
            $table->unsignedBigInteger('ID_TALLER');
            $table->unsignedBigInteger('ID_SECTOR');
            $table->string('nombre',200);
            $table->string('descripcion',50);
            $table->boolean('estado');
            $table->primary(['ID_TALLER','ID_SECTOR']);
            $table->foreign('ID_TALLER')->references('ID_TALLER')->on('tallers');
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
