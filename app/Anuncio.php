<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $fillable = ['nome', 'descricao', 'marca', 'modelo', 'versao', 'valor', 'user', 'moto', 'ano'];

    public function anuncio_dados(){
        return $this->hasMany('App\AnuncioDados');
    }

    public function anuncio_imagens(){
        return $this->hasMany('App\AnuncioImagem');
    }

    public function users(){
        return $this->belongsTo('App\User', 'user');
    }

}
