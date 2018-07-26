<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Revenda;
use App\Anuncio;
use App\Marca;
use App\Modelos;
use App\Versao;
use App\AnuncioImagem;
use App\AnuncioDados;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Acessorio;
use App\Adicional;

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
          $user->pessoa_fisica = false;
          $user->documento = $veiculo->loja->cnpj;
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
      $empty = AnuncioDados::where([
        ['nome', '=', 'id_xml'],
        ['valor', '=', $veiculo->id]
      ])->get()->isEmpty();
      if($empty && $this->filtro()){
        $anuncio = new Anuncio();
        $anuncio->nome = $veiculo->marca.' '.$veiculo->modelo.' - '.$veiculo->versao;
        $anuncio->descricao = (string)$veiculo->observacao;
        $anuncio->marca = Marca::where('nome', $veiculo->marca)->first()->id;
        $anuncio->importado = true;
        $anuncio->ano = $veiculo->anomodelo;
        $anuncio->moto = $veiculo->tipoveiculo == 'Carro'? false:true;
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
        //Acredito que este trecho possa ser melhorado...
        //$this->createAnuncioDado($anuncio, 'ano_modelo', $veiculo->anomodelo);
        $this->createAnuncioDado($anuncio, 'cambio', $veiculo->cambio);
        $this->createAnuncioDado($anuncio, 'km', $veiculo->km);
        $this->createAnuncioDado($anuncio, 'portas', $veiculo->portas);
        $this->createAnuncioDado($anuncio, 'cor', $veiculo->cor);
        $this->createAnuncioDado($anuncio, 'combustivel', $veiculo->combustivel);
        $this->createAnuncioDado($anuncio, 'id_xml', $veiculo->id, false);
        $this->createAnuncioDado($anuncio, 'placa', $veiculo->placa);
        //$this->createAnuncioDado($anuncio, 'tipo_veiculo', $veiculo->tipoveiculo);
        foreach($veiculo->acessorios->acessorio as $acessorio){
          $this->createAcessorios($anuncio, (string)$acessorio);
        }
        foreach($veiculo->opcionais->opcional as $adicional){
          $this->createAdicional($anuncio, $adicional);
        }
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

    public function createAnuncioDado($anuncio, $key, $value, $visible = true){
      $anuncioDado = new AnuncioDados();
      $anuncioDado->anuncio = $anuncio->id;
      $anuncioDado->nome = $key;
      $anuncioDado->valor = $value;
      $anuncioDado->visible = $visible;
      $anuncioDado->save();
    }

    public function createAcessorios($anuncio, $_acessorio){
      $acessorio = new Acessorio();
      $acessorio->anuncio = $anuncio->id;
      $acessorio->nome = $_acessorio;
      $acessorio->save();
    }

    public function createAdicional($anuncio, $_adicional){
      $adicional = new Adicional();
      $adicional->anuncio = $anuncio->id;
      $adicional->nome = $_adicional;
      $adicional->save();
    }

    //Estas são as condições para que o anúncio vindo do xml seja importado para o sistema.
    public function filtro(){
      return true;
    }

    public function create(Request $request){
      return view('revendas.create');
    }
}
