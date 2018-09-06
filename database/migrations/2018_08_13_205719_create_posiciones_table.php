<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posiciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('equipo_id')->unique();
            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->unsignedInteger('puntos')->default(0);
            $table->integer('Partidos')->default(0)->nullable();
            $table->integer('PGanaddos')->default(0);
            $table->integer('PEmpatados')->default(0);
            $table->integer('PPerdidos')->default(0);
            $table->integer('GF')->default(0);
            $table->integer('GC')->default(0);
            $table->integer('Diferencia')->default(0);
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
        Schema::dropIfExists('posiciones');
    }
}
