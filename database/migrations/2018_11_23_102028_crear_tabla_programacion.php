<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProgramacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Programacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('canal')->nullable();
            $table->string('programa')->nullable();
            $table->string('dia')->nullable();
            $table->string('horaI')->nullable();
            $table->string('horaF')->nullable();
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
        Schema::dropIfExists('Programacion');
    }
}
