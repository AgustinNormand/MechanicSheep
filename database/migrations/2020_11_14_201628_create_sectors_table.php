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
            $table->unsignedBigInteger('ID_TALLER')->index();
            $table->unsignedBigInteger('ID_SECTOR')->index();
            $table->string('nombre',200);
            $table->string('descripcion',50)->nulleable();
            $table->boolean('estado');
            $table->primary(['ID_TALLER','ID_SECTOR']);
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
