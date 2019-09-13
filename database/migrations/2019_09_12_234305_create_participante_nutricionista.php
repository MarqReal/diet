<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipanteNutricionista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participante_nutricionista', function (Blueprint $table) {
            $table->integer('nutricionista_id')->unsigned();
            $table->integer('participante_id')->unsigned();
            $table->foreign('nutricionista_id')->references('id')->on('nutricionistas')->onDelete('cascade');
            $table->foreign('participante_id')->references('id')->on('participantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participante_nutricionista');
    }
}
