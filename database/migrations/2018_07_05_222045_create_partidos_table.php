<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger("equipocasa");
            $table->foreign('equipocasa')->references('id')->on('equipos');

            $table->unsignedInteger("equipovisita");
            $table->foreign('equipovisita')->references('id')->on('equipos');

            $table->integer("golCasa")->default(0);
            $table->integer("golVisita")->default(0);

            $table->unsignedInteger('jornada');
            $table->foreign('jornada')->references('num_jornada')->on('jornadas');

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
        Schema::dropIfExists('partidos');
    }
}
