<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersDietaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_dieta', function (Blueprint $table) {
            $table->integer('dieta_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('dieta_id')->references('id')->on('dietas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('ativo');
            $table->integer('quantidade_participacao');
            $table->date('dt_inicio');
            $table->date('dt_termino'); 
            $table->primary(['dieta_id', 'user_id', 'quantidade_participacao']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_dieta');
    }
}
