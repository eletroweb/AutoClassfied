<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Revenda;
use App\Anuncio;
use App\Marca;
use App\Modelos;
use App\Versao;
use App\AnuncioImagem;
use Illuminate\Support\Facades\Hash;
use App\User;

class RevendaController extends Controller
{
    //Este método importa as revendas e seus respectivos anúncios
    public function importRevendas(Request $request){
      //07627884000158
      $url = 'http://xml.dsautoestoque.com/?l='.$request->input('cnpj').'&v=2';
      $result = simplexml_load_string(file_get_contents($url));
      foreach($result as $veiculo){
        //O primeiro passo é verificar se a revenda existe.
        $r = $veiculo->loja;
        $cnpj = $r->cnpj;
        if($revenda = Revenda::where('cnpj', $cnpj)->first()){
          //Esta revenda existe no nosso banco...
          //var_dump((string)$veiculo->modelo);exit;
          $this->import($veiculo, $revenda);
        }else{
          $user = new User();
          $user->name = $veiculo->loja->contato->nome;
          $user->email = $veiculo->loja->contato->email;
          $user->password = Hash::make($cnpj);
          $user->save();
          $revenda = new Revenda();
          $revenda->razaosocial = $veiculo->loja->nomefantasia;
          $revenda->nomefantasia = $veiculo->loja->nomefantasia;
          $revenda->cnpj = $veiculo->loja->cnpj;
          $revenda->user = $user->id;
          $revenda->save();
          $this->import($veiculo, $revenda);
        }
      }
      return view('revendas.index')->with('status', 'Importação de revenda realizada com sucesso!');
    }

    public function index(Request $request){
      return view('revendas.index');
    }

    private function import($veiculo, $revenda){
      //Esta revenda existe no nosso banco...
      $anuncio = new Anuncio();
      $anuncio->nome = $veiculo->marca.' '.$veiculo->modelo.' - '.$veiculo->versao;
      $anuncio->descricao = (string)$veiculo->observacao;
      $anuncio->marca = Marca::where('nome', $veiculo->marca)->first()->id;
      $anuncio->importado = true;
      if($modelo = Modelos::where([
          ['nome', (string)$veiculo->modelo],
          ['marca', $anuncio->marca],
      ])->first()){
        $anuncio->modelo = $modelo->id;
      }else{
        $modelo = new Modelos();
        $modelo->nome= (string)$veiculo->modelo;
        $modelo->marca = $anuncio->marca;
        $modelo->save();
        $anuncio->modelo = $modelo->id;
      }
      if($versao = Versao::where([
          ['nome', (string)$veiculo->versao],
          ['modelo', $anuncio->modelo],
      ])->first()){
        $anuncio->versao = $versao->id;
      }else{
        $versao = new Versao();
        $versao->nome = (string)$veiculo->versao;
        $versao->modelo = $anuncio->modelo;
        $versao->save();
        $anuncio->versao = $versao->id;
      }
      $anuncio->user = $revenda->user;
      $anuncio->valor = str_replace(['R$ ', '.', ','], '', $veiculo->preco);
      $anuncio->save();
      $first = true;
      foreach($veiculo->fotos->foto as $foto){
        $img = new AnuncioImagem();
        $img->url = $foto;
        $img->anuncio = $anuncio->id;
        $img->first = $first;
        $img->save();
        $first = false;
      }
    }
}
