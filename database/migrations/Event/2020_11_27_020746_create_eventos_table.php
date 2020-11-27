<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id('ID_EVENTO');
            $table->string('TITLE', 255);
            $table->text('DESCRIPTION');
            $table->string('COLOR', 50);
            $table->string('TEXT_COLOR', 50);
            $table->dateTime('START');
            $table->dateTime('END');

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
        Schema::dropIfExists('eventos');
    }
}
