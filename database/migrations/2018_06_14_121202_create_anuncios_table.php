<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     * Esta tabela cuida da parte de anúncios. O anúncio contém um veículo e um usuário, além das informações básicas.
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->longText('descricao');
            $table->integer('marca');
            $table->integer('modelo');
            $table->integer('versao');
            $table->integer('user');
            $table->integer('valor');
            $table->integer('ano');
            $table->integer('km');
            $table->integer('transaction_id')->nullable(true);
            $table->boolean('usado')->default(true);
            $table->boolean('blindagem')->default(false);
            $table->integer('visualizacoes')->default(0);
            $table->boolean('importado')->default(false);
            $table->boolean('moto')->default(false);
            $table->boolean('ativo')->default(false);
            $table->boolean('patrocinado')->default(false);
            $table->boolean('revenda')->default(false);
            $table->boolean('unicodono')->default(false);
            $table->boolean('chave_reserva')->default(false);
            $table->boolean('laudo_cautelar')->default(false);
            $table->boolean('comprovante_manutencao')->default(false);
            $table->integer('ano_modelo')->nullable();
            $table->boolean('estuda_troca')->default(false);
            $table->boolean('manual')->default(false);
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
        Schema::dropIfExists('anuncios');
    }
}
