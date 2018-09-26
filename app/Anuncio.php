<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AnuncioImagem;
use App\Imagem;
use App\Revenda;
use App\Transaction;
use Illuminate\Support\Facades\Storage;


class Anuncio extends Model
{
    protected $fillable = ['titulo', 'descricao', 'marca', 'km', 'usado', 'modelo', 'versao', 'valor', 'user', 'moto',
                            'ano', 'blindagem'];


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
        if($img_anuncio){
            $imagem = Imagem::find($img_anuncio->imagem);
          if(!$this->importado){
            $url = Storage::url($imagem->url);
          }else{
            $url = $imagem->url;
          }
        }
        return $url;
    }

    public function getStatus(){
      return Transaction::$status_pagseguro[$this->transaction->status];
    }

    public function getNomeFormated(){
      return str_replace(" ", "-", str_replace("  ", " ", $this->titulo));
    }

    public function getKm(){
      return $this->km;
    }

    public function marcas(){
      return $this->belongsTo('App\Marca', 'marca');
    }

    public function modelos(){
      return $this->belongsTo('App\Modelos', 'modelo');
    }

    public function versaos(){
      return $this->belongsTo('App\Versao', 'versao');
    }

    public function getCambio(){
      return AnuncioDados::where([
        ['nome', '=', 'Cambio'],
        ['anuncio', '=', $this->id]
      ])->first()->valor;
    }

    public function transaction(){
      return $this->belongsTo('App\Transaction');
    }

    public function getUrl(){
      $marca = str_replace(' ', '-', $this->marcas->nome);
      $modelo = str_replace(' ', '-', trim($this->modelos->nome));
      $versao = str_replace(' ', '-', trim($this->versaos->nome));
      $titulo = $this->getNomeFormated();
      $blindado = $this->blindagem?'blindado':'preco';
      $ano = $this->ano;
      $id = $this->id;
      if($revenda = $this->users->isRevenda()){
          $nome = str_replace(' ', '-', $revenda->nomefantasia);
          return "/$nome/$marca/$modelo/$versao/$titulo/$ano/$blindado/$id/";
      }
      return "/anuncios/$marca/$modelo/$versao/$titulo/$ano/$blindado/$id/";
    }

}
