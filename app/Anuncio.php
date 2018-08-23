<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AnuncioImagem;
use App\Imagem;

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

    public function urlImagemFirst(){
        $img_anuncio = AnuncioImagem::where([['anuncio', $this->id]])->first();
        $url = '';
        $imagem = Imagem::find($img_anuncio->imagem);
        if(!$this->importado){
          $url = Storage::url($imagem->url);
        }else{
          $url = $imagem->url;
        }
        return $url;
    }

}
