<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRevendaRequest;
use App\Http\Requests\UpdateRevendaRequest;
use App\Repositories\RevendaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Revenda;
use App\Anuncio;
use App\Marca;
use App\Modelos;
use App\Versao;
use App\AnuncioImagem;
use App\AnuncioDados;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Acessorio;
use App\Adicional;
use App\Endereco;
use App\Complemento;
use App\Imagem;
use App\UserDado;
use Illuminate\Support\Facades\Storage;
use App\VisualizacaoAnuncio;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Video;

class RevendaController extends AppBaseController
{
  /** @var  RevendaRepository */
  private $revendaRepository;

  public function __construct(RevendaRepository $revendaRepo)
  {
    $this->revendaRepository = $revendaRepo;
  }

  /**
  * Display a listing of the Revenda.
  *
  * @param Request $request
  * @return Response
  */
  public function index(Request $request)
  {
    $this->revendaRepository->pushCriteria(new RequestCriteria($request));
    $revendas = $this->revendaRepository->all();

    return view('revendas.index')
    ->with('revendas', $revendas);
  }

  /**
  * Show the form for creating a new Revenda.
  *
  * @return Response
  */
  public function create()
  {
    return view('revendas.create');
  }

  /**
  * Store a newly created Revenda in storage.
  *
  * @param CreateRevendaRequest $request
  *
  * @return Response
  */
  /*public function store(CreateRevendaRequest $request)
  {
    $input = $request->all();

    $revenda = $this->revendaRepository->create($input);

    Flash::success('Revenda salva com sucesso.');

    return redirect(route('revendas.index'));
  }*/

  /**
  * Display the specified Revenda.
  *
  * @param  int $id
  *
  * @return Response
  */
  public function show(Request $request, $id)
  {
    $revenda = $this->revendaRepository->findWithoutFail($id);

    if (empty($revenda)) {
      Flash::error('Revenda não encontrada');

      return redirect(route('revendas.index'));
    }
    $this->homepage($request, $id);
  }

  /**
  * Show the form for editing the specified Revenda.
  *
  * @param  int $id
  *
  * @return Response
  */
  public function edit($id)
  {
    $revenda = $this->revendaRepository->findWithoutFail($id);

    if (empty($revenda)) {
      Flash::error('Revenda não encontrada');

      return redirect(route('revendas.index'));
    }

    return view('revendas.edit')->with('revenda', $revenda);
  }

  /**
  * Update the specified Revenda in storage.
  *
  * @param  int              $id
  * @param UpdateRevendaRequest $request
  *
  * @return Response
  */
  public function update($id, UpdateRevendaRequest $request)
  {
    $revenda = $this->revendaRepository->findWithoutFail($id);
    if (empty($revenda)) {
      Flash::error('Revenda não encontrada');
      return redirect(route('revendas.index'));
    }

    $endereco = Endereco::find($revenda->endereco);
    $endereco->logradouro = $request->input('logradouro');
    $endereco->numero = $request->input('numero');
    $endereco->bairro = $request->input('bairro');
    $endereco->uf = $request->input('uf');
    $endereco->cidade = $request->input('cidade');
    $endereco->cep = $request->input('cep');
    $endereco->save();
    $data = $request->all();
    if($request->hasFile('capa')){
      $data['capa'] = Storage::put('public', $data['capa']);
    }
    if($request->hasFile('logo')){
      $data['logo'] = Storage::put('public', $data['logo']);
    }

    $data['user']= Revenda::find($id)->user;
    $data['ativo']= isset($data['ativo'])?$data['ativo']:0;
    $revenda = $this->revendaRepository->update($data, $id);
    Flash::success('Revenda atualizada com sucesso.');
    return redirect()->back();
  }

  /**
  * Remove the specified Revenda from storage.
  *
  * @param  int $id
  *
  * @return Response
  */
  public function destroy($id)
  {
    $revenda = $this->revendaRepository->findWithoutFail($id);

    if (empty($revenda)) {
      Flash::error('Revenda não encontrada');
      return redirect(route('revendas.index'));
    }

    $this->revendaRepository->delete($id);

    Flash::success('Revenda deleted successfully.');

    return redirect(route('revendas.index'));
  }

  public function importAll(Request $request){
    $url = 'http://xml.dsautoestoque.com/?hash=Tm/+qav0hOhGuEQN+QfYqKVQ8IY=&l=';
    $result = simplexml_load_string(file_get_contents($url));
    foreach($result->ad as $anuncio){
        //$cnpj = (string)$anuncio->cnpj;
        $revenda = $this->importSingleRevenda($anuncio);
        $sem_foto = false;
        foreach($anuncio->pictures as $pictures){
          $u = (string)$pictures->item->url;
          if(empty($u))
            $sem_foto = true;
        }
        if(!$sem_foto){
          $this->importSingleAll($anuncio, $revenda);
        }
        /*$this->importRevendas($request, str_replace(".", "", str_replace("-", "", $cnpj)));*/
    }
    return true;
  }

  public function importSingleRevenda($veiculo){
    $cnpj = $veiculo->cnpj;
    if($revenda = Revenda::where('cnpj', $cnpj)->first()){
      return $revenda;
    }else{
      $user = User::where('email', $veiculo->email)->first();
      if(!$user){
        $user = new User();
        $user->name = $veiculo->dealer;
        $user->email = $veiculo->email;
        $user->password = Hash::make($cnpj);
        $user->pessoa_fisica = false;
        $user->documento = $veiculo->cnpj;
        $user->save();
      }
      $endereco = new Endereco();
      $endereco->logradouro = $veiculo->address;
      $endereco->uf= $veiculo->state;
      $endereco->cidade= $veiculo->city;
      $endereco->bairro= $veiculo->neighborhood;
      $endereco->numero= 1;
      $endereco->cep= $veiculo->postcode;
      $endereco->save();
      $revenda = new Revenda();
      $revenda->razaosocial = $veiculo->dealer;
      $revenda->nomefantasia = $veiculo->dealer;
      $revenda->cnpj = $veiculo->cnpj;
      $revenda->user = $user->id;
      $revenda->endereco = $endereco->id;
      $revenda->save();
      $telefone = new UserDado();
      $telefone->nome = "telefone";
      $telefone->valor = $veiculo->phone;
      $telefone->user = $user->id;
      $telefone->save();
      return $revenda;
    }
  }

  //Este método importa as revendas e seus respectivos anúncios
  public function importRevendas(Request $request, $data = null){
    //07627884000158
    try{
      $cnpj = $data?$data:$request->input('cnpj');
      $url = 'http://xml.dsautoestoque.com/?l='.$cnpj.'&v=2';
      $result = simplexml_load_string(file_get_contents($url));
      //var_dump((string)$result[0]);exit;
      $cons = strcmp((string)$result[0], '');
      //var_dump($result);exit;
      if($cons == 1){
        $request->session()->flash('status', 'Revenda inválida!');
        $request->session()->flash('alert', 'danger');
        return view('revendas.admin');
      }
      //Limitar importações de revendas
      $limite = $request->input('limite')?$request->input('limite'):-1;
      $limite = $limite=='-1'?-1:intval($request->input('limite'));
      foreach($result as $veiculo){
        $limite = $limite?$limite:0;
        if($limite != -1){
          if($limite > 0){
            //var_dump($limite);
            $limite--;
          }
          else
            return response()->json(['message'=> $message, 'status'=> $status]);
        }
        //O primeiro passo é verificar se a revenda existe.
        $r = $veiculo->loja;
        $cnpj = $r->cnpj;
        if($revenda = Revenda::where('cnpj', $cnpj)->first()){
          $this->import($veiculo, $revenda);
          $message= 'Revenda atualizada com sucesso!';
          $status= 'success';
        }else{
          $user = User::where('email', $veiculo->loja->contato->email)->first();
          if(!$user){
            $user = new User();
            $user->name = $veiculo->loja->contato->nome;
            $user->email = $veiculo->loja->contato->email;
            $cnpj= str_replace('/', '', str_replace('-', '', str_replace('.', '', $cnpj)));
            $user->password = Hash::make($cnpj);
            $user->pessoa_fisica = false;
            $user->documento = $veiculo->loja->cnpj;
            $user->save();
          }
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
          $telefone = new UserDado();
          $telefone->nome = "telefone";
          $telefone->valor = $veiculo->loja->contato->telefone;
          $telefone->user = $user->id;
          $telefone->save();
          $this->import($veiculo, $revenda);
          $message= 'Revenda importada com sucesso! Por se tratar de ser uma nova revenda,
                     também criamos a conta. O login é o e-mail da revenda, sua senha o cnpj da revenda.';
          $status= 'success';
        }
      }
    }catch(ErrorException $e){
        $message = $e->getMessage();
        $status= 'danger';
    }
    return response()->json(['message'=> $message, 'status'=> $status]);
  }

  public function admin(Request $request){
    return view('revendas.admin');
  }

  private function importSingleAll($veiculo, $revenda){
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
      $anuncio->titulo = $veiculo->make." ".$veiculo->model.' '.$veiculo->version;
      $anuncio->descricao = (string)$veiculo->content;
      $anuncio->marca = Marca::where('nome', $veiculo->make)->first()->id;
      $anuncio->importado = true;
      $anuncio->ano = $veiculo->year;
      $anuncio->moto = strcmp((string)$veiculo->car_type, 'moto')==0? true:false;
      $anuncio->km = $veiculo->mileage;
      $anuncio->blindagem = strcmp((string)$veiculo->armored, ' não ')!=0?true:false;
      $anuncio->usado = strcmp($veiculo->is_new, 'usado')==0?1:0;
      $anuncio->ativo = true;
      if($modelo = Modelos::where([
        ['nome', (string)$veiculo->model],
        ['marca', $anuncio->marca],
        ])->first()){
          $anuncio->modelo = $modelo->id;
        }else{
          $modelo = new Modelos();
          $modelo->nome= (string)$veiculo->model;
          $modelo->marca = $anuncio->marca;
          $modelo->save();
          $anuncio->modelo = $modelo->id;
        }
        if($versao = Versao::where([
          ['nome', (string)$veiculo->version],
          ['modelo', $anuncio->modelo],
          ])->first()){
            $anuncio->versao = $versao->id;
          }else{
            $versao = new Versao();
            $versao->nome = (string)$veiculo->version;
            $versao->modelo = $anuncio->modelo;
            $versao->save();
            $anuncio->versao = $versao->id;
          }
          $anuncio->user = $revenda->user;
          $anuncio->valor = str_replace(['R$ ', '.', ','], '', $veiculo->price.'00');
          $anuncio->save();
          $first = true;
          //Acredito que este trecho possa ser melhorado...
          //$this->createAnuncioDado($anuncio, 'ano_modelo', $veiculo->anomodelo);
          $this->createAnuncioDado($anuncio, 'cambio', $veiculo->transmission);
          $this->createAnuncioDado($anuncio, 'portas', $veiculo->doors);
          $this->createAnuncioDado($anuncio, 'cor', $veiculo->color);
          $this->createAnuncioDado($anuncio, 'combustivel', $veiculo->fuel);
          $this->createAnuncioDado($anuncio, 'id_xml', $veiculo->id, false);
          $this->createAnuncioDado($anuncio, 'placa', 'NNN');
          //$this->createAnuncioDado($anuncio, 'tipo_veiculo', $veiculo->tipoveiculo);
          //if($veiculo->acessory){
            foreach($veiculo->acessory->item as $acessorio){
              $this->createAcessorios($anuncio, (string)$acessorio);
            }
          //}
          //if($veiculo->optional){
            foreach($veiculo->optional->item as $adicional){
              $this->createAdicional($anuncio, $adicional);
            }
          //}
          if($veiculo->pictures){
            foreach($veiculo->pictures->item as $foto){
              $url = (string)$foto->url;
              if(!empty($url)){
                $old_img = Imagem::where([['url', $url]])->first();
                $img = $old_img? $old_img:(new Imagem());
                $img->url= $url;
                $img->save();
                $old = AnuncioImagem::where('imagem', $img->id)->first();
                $img_anuncio = $old? $old:(new AnuncioImagem());
                $img_anuncio->imagem = $img->id;
                $img_anuncio->anuncio = $anuncio->id;
                $img_anuncio->first = $old?$img_anuncio->first:$first;
                $img_anuncio->save();
                $first = false;
              }

            }
          }
        }

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
    $anuncio->titulo = $veiculo->marca." ".$veiculo->modelo.' '.$veiculo->versao;
    $anuncio->descricao = (string)$veiculo->observacao;
    $anuncio->marca = Marca::where('nome', $veiculo->marca)->first()->id;
    $anuncio->importado = true;
    $anuncio->ano = $veiculo->anomodelo;
    $anuncio->moto = $veiculo->tipoveiculo == 'Carro'? false:true;
    $anuncio->km = $veiculo->km;
    $anuncio->blindagem = $this->isBlindado($veiculo);
    $anuncio->usado = $veiculo->zerokm=='N'?1:0;
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
      $this->createAnuncioDado($anuncio, 'portas', $veiculo->portas);
      $this->createAnuncioDado($anuncio, 'cor', $veiculo->cor);
      $this->createAnuncioDado($anuncio, 'combustivel', $veiculo->combustivel);
      $this->createAnuncioDado($anuncio, 'id_xml', $veiculo->id, false);
      $this->createAnuncioDado($anuncio, 'placa', substr($veiculo->placa , 0, 2));
      //$this->createAnuncioDado($anuncio, 'tipo_veiculo', $veiculo->tipoveiculo);
      foreach($veiculo->acessorios->acessorio as $acessorio){
        $this->createAcessorios($anuncio, (string)$acessorio);
      }
      foreach($veiculo->opcionais->opcional as $adicional){
        $this->createAdicional($anuncio, $adicional);
      }
      //$this->complementos($veiculo, $anuncio);
      foreach($veiculo->fotos->foto as $foto){
        $old_img = Imagem::where([['url', $foto]])->first();
        $img = $old_img? $old_img:(new Imagem());
        $img->url= $foto;
        $img->save();
        $old = AnuncioImagem::where('imagem', $img->id)->first();
        $img_anuncio = $old? $old:(new AnuncioImagem());
        $img_anuncio->imagem = $img->id;
        $img_anuncio->anuncio = $anuncio->id;
        $img_anuncio->first = $old?$img_anuncio->first:$first;
        $img_anuncio->save();
        $first = false;
      }
    }

  }

  public function createAnuncioDado($anuncio, $key, $value, $visible = true){
    $old = AnuncioDados::where([
      ['nome', '=', $key],
      ['anuncio', '=', $anuncio->id]
    ])->first();
    $anuncioDado = $old? $old:(new AnuncioDados());
    $anuncioDado->anuncio = $anuncio->id;
    $anuncioDado->nome = $key;
    $anuncioDado->valor = $value;
    $anuncioDado->visible = $visible;
    $anuncioDado->save();
  }

  public function createAcessorios($anuncio, $_acessorio){
    if(!Acessorio::where([['nome', '=', $_acessorio],['anuncio','=',$anuncio->id]])->first()){
      $acessorio = new Acessorio();
      $acessorio->anuncio = $anuncio->id;
      $acessorio->nome = $_acessorio;
      $acessorio->save();
    }
  }

  public function createAdicional($anuncio, $_adicional){
    if(!Adicional::where([['nome', '=', $_adicional],['anuncio','=',$anuncio->id]])->first()){
      $adicional = new Adicional();
      $adicional->anuncio = $anuncio->id;
      $adicional->nome = $_adicional;
      $adicional->save();
    }
  }

  //Estas são as condições para que o anúncio vindo do xml seja importado para o sistema.
  public function filtro($veiculo){
    return $veiculo->km == 0  || intval($veiculo->anomodelo) >= 2015; //|| $this->isUnicoDono($veiculo);
  }

  public function sejarevendedor(Request $request){
    return view('revendas.seja_revendedor');
  }

  public function isBlindado($veiculo){
    foreach($veiculo->complementos->complemento as $c){
      $c = (string)$c;
      return $c == 'Blindado';
    }
    return false;
  }

  public function complementos($veiculo, $anuncio){
    if(isset($veiculo->complementos->complemento)){
      foreach ($veiculo->complementos->complemento as $complemento) {
        $c = (string)$complemento;
        if(!Complemento::where('nome', $c)->first()){
          $_c = new Complemento();
          $_c->nome = $c;
          $_c->anuncio = $anuncio->id;
          $_c->save();
        }
      }
    }
    return false;
  }

  public function revendas(Request $request){
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
      return view('revendas.revendas')->with('revendas', $revendas);
  }

  public function store(Request $request){
    $data = $request->all();
    $endereco = Endereco::create($data);
    $data = array_add($data, 'endereco', $endereco->id);
    if($request->hasFile('capa')){
      $data['capa'] = Storage::put('public', $data['capa']);
    }
    if($request->hasFile('logo')){
      $data['logo'] = Storage::put('public', $data['logo']);
    }
    $revenda = Revenda::create($data);
    $request->session()->flash('status', 'Revenda criada com sucesso. Você receberá um e-mail
                                          com o nosso contato para a confirmação do seu plano.
                                          Obrigado por fazer parte do Unicodono.');
    return redirect('/revendas');
  }

  public function homepage(Request $request, $nome, $cidade, $id){
    $data = $request->all();
    unset($data['page']);
    $revenda = Revenda::find($id);
    if(empty($data)){
      $anuncios = Anuncio::where('user', $revenda->user)->orderBy('id', 'desc')->paginate(20);
    }else {
      $param = AnuncioController::filter_search($data);
      $anuncios = Anuncio::where('user', $revenda->user)->where($param[0])->orderBy('id', 'desc')->paginate(20);
    }
    $videos = Video::where([
      ['user_id', $revenda->user],
      ['ativo', true],
      ['isHomeVideo', true]
    ])->paginate(20);
    return view('revendas.homepage.revenda')->with(['revenda'=> $revenda, 'anuncios'=> $anuncios, 'videos' => $videos]);
  }

  public function config(Request $request, $id){
    $revenda = Revenda::find($id);
    return view('revendas.homepage.config')->with('revenda', $revenda);
  }

  public function viewsByMonth(Request $request){
    $revenda = $request->input('revenda');
    $carbon = Carbon::now();
    $visualizacoes = array();
    for($month= 1; $month <= 12; $month++) {
      $visualizacoes[] = VisualizacaoAnuncio::join('anuncios', 'anuncios.id', '=', 'visualizacao_anuncios.anuncio')
                                        ->join('revendas', 'revendas.user', '=', 'anuncios.user')
                                        ->select(DB::raw('count(*) as visualizacoes'))
                                        ->where('revendas.id', '=', $revenda)
                                        ->whereMonth('anuncios.created_at', $month)
                                        ->whereYear('anuncios.created_at', $carbon->year)
                                        ->first();
    }
    return response()->json($visualizacoes);
  }

}
