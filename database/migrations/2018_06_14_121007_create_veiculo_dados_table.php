<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculoDadosTable extends Migration
{
    /**
     * Run the migrations.
     * Esta tabela indicará informações adicionais sobre o veículo
     * @return void
     */
    public function up()
    {
        Schema::create('veiculo_dados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('valor'); //Refere-se ao valor deste metadado
            $table->integer('veiculo');
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
        Schema::dropIfExists('veiculo_dados');
    }
}
