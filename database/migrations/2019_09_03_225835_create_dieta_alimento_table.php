<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietaAlimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dieta_alimento', function (Blueprint $table) {
            $table->integer('dieta_id')->unsigned();
            $table->integer('alimento_id')->unsigned();
            $table->foreign('dieta_id')->references('id')->on('dietas')->onDelete('cascade');
            $table->foreign('alimento_id')->references('id')->on('alimentos')->onDelete('cascade');
            $table->string('refeicao');
            $table->integer('quantidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dieta_alimento', function (Blueprint $table) {
            //
        });
    }
}
