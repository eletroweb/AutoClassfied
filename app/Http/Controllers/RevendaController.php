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
use App\Endereco;
use App\Complemento;
use App\Imagem;

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
          $request->session()->flash('status',
           'Revenda atualizada com sucesso!');
        }else{
          $user = new User();
          $user->name = $veiculo->loja->contato->nome;
          $user->email = $veiculo->loja->contato->email;
          $user->password = Hash::make($cnpj);
          $user->pessoa_fisica = false;
          $user->documento = $veiculo->loja->cnpj;
          $user->save();
          $endereco = new Endereco();
          $endereco->logradouro = $veiculo->loja->endereco->logradouro;
          $endereco->uf= $veiculo->loja->endereco->uf;
          $endereco->cidade= $veiculo->loja->endereco->cidade;
          $endereco->bairro= $veiculo->loja->endereco->bairro;
          $endereco->numero= $veiculo->loja->endereco->numero;
          $endereco->cep= $veiculo->loja->endereco->cep;
          $endereco->save();
          $revenda = new Revenda();
          $revenda->razaosocial = $veiculo->loja->nomefantasia;
          $revenda->nomefantasia = $veiculo->loja->nomefantasia;
          $revenda->cnpj = $veiculo->loja->cnpj;
          $revenda->user = $user->id;
          $revenda->endereco = $endereco->id;
          $revenda->save();
          $this->import($veiculo, $revenda);
          $request->session()->flash('status',
           'Revenda importada com sucesso! Por se tratar de ser uma nova revenda,
            também criamos a conta. O login é o e-mail da revenda, sua senha o cnpj da revenda.');
        }
      }

      return view('revendas.admin');
    }

    public function admin(Request $request){
      return view('revendas.admin');
    }

    private function import($veiculo, $revenda){
      //Esta revenda existe no nosso banco...
      $anuncio_ = AnuncioDados::where([
        ['nome', '=', 'id_xml'],
        ['valor', '=', $veiculo->id]
      ])->first();
      if($this->filtro($veiculo)){
        if($anuncio_)
          $anuncio = Anuncio::find($anuncio_->anuncio);
        else
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
        //$this->complementos($veiculo, $anuncio);
        foreach($veiculo->fotos->foto as $foto){
          $img = new Imagem();
          $img->url= $foto;
          $img->save();
          $img_anuncio = new AnuncioImagem();
          $img_anuncio->imagem = $img->id;
          $img_anuncio->anuncio = $anuncio->id;
          $img_anuncio->first = $first;
          $img_anuncio->save();
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
    public function filtro($veiculo){
      return $veiculo->km == 0 && intval($veiculo->anomodelo) >= 2015;// && $this->isUnicoDono($veiculo);
    }

    public function create(Request $request){
      return view('revendas.create');
    }

    public function complementos($veiculo, $anuncio){
      if(isset($veiculo->complementos->complemento)){
        foreach ($veiculo->complementos->complemento as $complemento) {
          $c = (string)$complemento;
          $_c = new Complemento();
          $_c->nome = $c;
          $_c->anuncio = $anuncio->id;
          $_c->save();
        }
      }
      return false;
    }

    public function index(Request $request){
      $revendas = array();
      if(empty($request->all())){
          $revendas = Revenda::paginate(20);
      }else{
        $data = $request->all();
        $data['cidade'] = $data['cidade']? $data['cidade']:'%'.$data['cidade'].'%';
        $data['estado'] = $data['estado']? $data['estado']:'%'.$data['estado'].'%';
        $revendas = Revenda::join('enderecos', 'enderecos.id', '=', 'revendas.endereco')
                ->select(['enderecos.*', 'revendas.*'])
                ->where([
                    ['revendas.nomefantasia', 'like', '%'.$request->input('nome').'%'],
                    ['enderecos.cidade', 'like', $data['cidade']],
                    ['enderecos.uf', 'like', $data['estado']]
                ])->paginate(20);
      }
      return view('revendas.index')->with('revendas', $revendas);
    }

    public function store(Request $request){
      $data = $request->all();
      $endereco = Endereco::create($data);
      $data = array_add($data, 'endereco', $endereco->id);
      $revenda = Revenda::create($data);
      $request->session()->flash('status', 'Revenda criada com sucesso. Você receberá um e-mail
                                            com o nosso contato para a confirmação do seu plano.
                                            Obrigado por fazer parte do Unicodono.');
      return redirect('/revendas');
    }

    public function homepage(Request $request, $id){
      $data = $request->all();
      $revenda = Revenda::find($id);
      if(empty($data)){
        $anuncios = Anuncio::where('user', $revenda->user)->orderBy('id', 'desc')->paginate(20);
      }else {
        $param = AnuncioController::filter_search($data);
        $anuncios = Anuncio::where('user', $revenda->user)->where($param)->orderBy('id', 'desc')->paginate(20);
      }
      return view('revendas.homepage.revenda')->with(['revenda'=> $revenda, 'anuncios'=> $anuncios]);
    }
}
