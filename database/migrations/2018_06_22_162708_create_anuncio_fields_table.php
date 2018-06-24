<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnuncioFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncio_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('meta_nome'); //Nome utilizado para inserção de meta dados no AnuncioDados
            $table->string('type');
            $table->string('place_holder');
            $table->double('step');
            $table->longText('helpText');
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
        Schema::dropIfExists('anuncio_fields');
    }
}
