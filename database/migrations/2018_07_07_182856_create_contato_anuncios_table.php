<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatoAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contato_anuncios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->string('telefone')->nullable();
            $table->boolean('contato_whatsapp')->default(false);
            $table->boolean('desejo_financiamento')->default(false);
            $table->boolean('veiculo_troca')->default(false);
            $table->longText('mensagem');
            $table->integer('anuncio');
            $table->boolean('visto')->default(false);
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
        Schema::dropIfExists('contato_anuncios');
    }
}
