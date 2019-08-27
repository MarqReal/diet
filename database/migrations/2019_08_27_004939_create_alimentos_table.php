<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao', 200); 
            $table->decimal('unidade_medida', 5, 2);
            $table->string('tipo_medida', 10); 
            $table->string('mes', 10); 
            $table->decimal('carboidrato', 4,2);
            $table->decimal('proteina', 4,2);
            $table->decimal('lipideos', 4,2);
            $table->decimal('fibra_alimentar', 4,2);
            $table->decimal('calorias', 4,2);
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
        Schema::dropIfExists('alimentos');
    }
}
