<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razaosocial');
            $table->string('nomefantasia');
            $table->string('cnpj');
            $table->integer('user');
            $table->boolean('ativo')->default(false);
            $table->integer('endereco');
            $table->integer('destaques')->default(0);
            $table->integer('plano')->nullable(true);
            $table->string('capa')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('revendas');
    }
}
