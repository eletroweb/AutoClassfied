<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Anuncio;
use Illuminate\Support\Facades\DB;

class Revenda extends Model
{

    private $anunciosPublicados = null;
    private $anunciosAtivos = null;

    protected $fillable = ['razaosocial', 'nomefantasia', 'user', 'cnpj', 'ativo', 'endereco', 'destaques'];

    public function end(){
      return $this->hasOne('App\Endereco', 'id', 'endereco');
    }

    public function usuario(){
      return $this->hasOne('App\User', 'id', 'user');
    }

    public function anunciosPublicados(){
      if($this->anunciosPublicados){
        return $this->anunciosPublicados;
      }
      $this->anunciosPublicados = Anuncio::where('user', $this->user)->get();
      return $this->anunciosPublicados;
    }

    public function anunciosAtivos(){
      if($this->anunciosAtivos){
        return $this->anunciosAtivos;
      }
      $this->anunciosAtivos= Anuncio::where([['user', '=', $this->user], ['ativo', '=', true]])->get();
      return $this->anunciosAtivos;
    }

    public function totalVisualizacoesAnuncios(){
      return VisualizacaoAnuncio::join('anuncios', 'anuncios.id', '=', 'visualizacao_anuncios.anuncio')
              ->select(DB::raw('count(*) as visualizacoes'))
              ->where('anuncios.user', $this->user)->get();

    }

    public function contatosAnuncios(){
      return Anuncio::join('contato_anuncios', 'contato_anuncios.anuncio', '=', 'anuncios.id')
                    ->select(['contato_anuncios.nome as contatante', 'contato_anuncios.created_at as realizado_em'
                              , 'contato_anuncios.email as email_contatante',
                              'contato_anuncios.*', 'anuncios.*'])
                    ->where('anuncios.user', $this->user)
                    ->get();
    }

}
