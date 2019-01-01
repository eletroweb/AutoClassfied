<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AnuncioImagem;
use App\Imagem;
use App\Revenda;
use App\Transaction;
use Illuminate\Support\Facades\Storage;
use App\Video;
use App\VisualizacaoAnuncio;
use App\VisualizacaoDados;

class Anuncio extends Model
{
    protected $fillable = ['titulo', 'descricao', 'marca', 'km', 'usado', 'modelo', 'versao', 'valor', 'user', 'moto',
                            'ano', 'blindagem', 'chave_reserva', 'laudo_cautelar', 'comprovante_manutencao', 'unicodono',
                            'ano_modelo'];


    public function anuncio_dados(){
        return $this->hasMany('App\AnuncioDados', 'anuncio');
    }

    public function adicionais(){
      return $this->hasMany('App\Adicional', 'anuncio');
    }

    public function anuncio_imagens(){
        return $this->hasMany('App\AnuncioImagem', 'anuncio');
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
        ['nome', '=', 'cambio'],
        ['anuncio', '=', $this->id]
      ])->first()->valor;
    }

    public function getCombustivel(){
      return AnuncioDados::where([
        ['nome', '=', 'combustivel'],
        ['anuncio', '=', $this->id]
      ])->first()->valor;
    }

    public function getDado($dado_key){
      $dado= AnuncioDados::where([
        ['nome', '=', $dado_key],
        ['anuncio', '=', $this->id]
      ])->first();
      if($dado)
        return $dado->valor;
      else
        return '';
    }

    public function setDado($dado_key, $dado_value){
      AnuncioDados::updateOrCreate(
        ['nome'=> $dado_key, 'anuncio'=> $this->id],
        ['valor'=> $dado_value]
      );
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
      $ano = $this->ano_modelo?$this->ano_modelo:$this->ano;
      $id = $this->id;
      if($revenda = $this->users->isRevenda()){
          $nome = str_replace(' ', '-', $revenda->nomefantasia);
          return "/$nome/$marca/$modelo/$versao/$titulo/$ano/$blindado/$id/";
      }
      return "/anuncios/$marca/$modelo/$versao/$titulo/$ano/$blindado/$id/";
    }

    public function getFullUrl(){
      return env('APP_URL').$this->getUrl();
    }

    public function generateTitle(){
      $this->titulo = $this->marcas->nome." ".$this->modelos->nome.' '.$this->versaos->nome;
      $this->save();
    }

    public function getValor(){
      return number_format(substr($this->valor.'0', 0, -3), 2, ",", ".");
    }

    public function video(){
      return $this->belongsTo('App\Video');
    }

    public function setVideo($link){
      if($link){
        Video::updateOrCreate(
          ['anuncio_id' => $this->id ],
          [
            'link' => $link,
            'thumbnail' => '',
            'ativo' => true,
            'user_id' => $this->user,
            'isHomeVideo' => false,
            //'anuncio_id'=> $this->id
          ]
        );
      }
    }

    public function visualizacoes(){
      return VisualizacaoAnuncio::where('anuncio', $this->id)->count();
    }

    public function visualizacoesDados(){
      return VisualizacaoDados::where('anuncio_id', $this->id)->count();
    }

}
