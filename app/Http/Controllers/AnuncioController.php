<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use App\AnuncioDados;
use App\AnuncioField;
use App\AnuncioImagem;
use App\VisualizacaoAnuncio;
use App\Adicional;
use App\Acessorio;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Imagem;
use App\Http\Controllers\PagseguroController;
use App\Versao;
use App\Marca;
use App\Video;
use App\Modelos as Modelo;
use Flash;
use DB;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PaymentRequest;

class AnuncioController extends Controller
{

  use Notifiable;

  private $opcionais = [
                'Ar-condicionado', 'Direção hidráulica', 'Vidros Elétricos', 'Travas Elétricas',
                'Alarme', 'Ar quente', 'Banco de motorista com regulagem', 'Airbag', 'ABS', 'Teto solar',
                'Bancos de couro', 'DVD/Multimídia', 'Computador de bordo', 'Rodas de liga leve', 'Tração 4x4'
              ];

    public function anuncie(Request $request){
      return view('anuncios.anuncie')->with('opcionais', $this->opcionais);
    }

    public function update(Request $request, $id){
      $anuncio = Anuncio::find($id);
      $anuncio->fill($request->all());
      $anuncio->push();
      $anuncio->setVideo($request->input('video'));
      $anuncio->setDado('Combustivel', $request->input('combustivel'));
      $anuncio->setDado('Cambio', $request->input('cambio'));
      $anuncio->setDado('Cor', $request->input('cor'));
      $anuncio->setDado('Portas', $request->input('portas'));
      $imagens = $request->input('imagens');
      AnuncioImagem::where('anuncio', $anuncio->id)->delete();
      Adicional::where('anuncio', $anuncio->id)->delete();
      $this->insertAdicionaisAnuncio($request, $anuncio);
      $this->insertImagesAnuncio($anuncio, $imagens);
      //$anuncio->usado = $request->input('usado');
      $anuncio->save();
      Flash::success('Anúncio atualizado com sucesso!');
      return redirect($anuncio->getUrl());
    }

    public function edit(Request $request, $id){
      $anuncio = Anuncio::findOrFail($id);
      if(Auth::user()->id == $anuncio->user or Auth::user()->isAdmin()){
        return view('anuncios.anuncie')->with(['anuncio'=> $anuncio, 'opcionais'=> $this->opcionais]);
      }
      return redirect('/');
    }

    public function anuncieStore(Request $request){
        $validatedData = $request->validate([
           'marca' => 'required',
           'modelo' => 'required',
           'versao' => 'required',
           'valor' => 'required',
           'descricao' => 'required',
           //'user' => 'required',
           'ano'=> 'required',
           'ano_modelo' => 'required',
           'moto' => '',
           'video' => '',
           'km'=> 'required',
           'usado'=> '',
           'cambio'=> 'required',
           'g-recaptcha-response' => 'required|captcha',
           'anuncio_destacado' =>'required',
           'tipo_pagamento' => 'required'
        ]);
        $validatedData['user']= Auth::user()->id;
        if($request->has('imagens')){
          $imagens = $request->input('imagens');
          $validatedData['titulo'] = 'building...';
          if(!Versao::find($request->input('versao'))){
            $versao = new Versao();
            $versao->nome = $request->input('versao');
            $versao->modelo = $request->input('modelo');
            $versao->save();
            $validatedData['versao'] = $versao->id;
          }
          $anuncio = Anuncio::create($validatedData);
          $this->insertAditionalData($request, $anuncio->id);
          $anuncio->generateTitle();
          $img_principal = new AnuncioImagem();
          $img_principal->imagem= Imagem::where('url', str_replace("\"", "", $imagens[0]))->first()->id;
          $img_principal->anuncio= $anuncio->id;
          $img_principal->first= true;
          $img_principal->save();
          $this->insertAdicionaisAnuncio($request, $anuncio);
          //$this->insertAcessoriosAnuncio($request, $anuncio);
          $this->insertImagesAnuncio($anuncio, $imagens);
          $this->insertAnuncioDados($request);
          $title = $anuncio->getUrl();
          //$anuncio->ativo = false;
          //if($request->input('anuncio_destacado') == 'y'){
            //if($request->has('tipo_pagamento')){
          $xml = PagseguroController::payment($request);
          if(isset($xml->error)){
            $request->flash();
            return redirect('/anuncie')->with('status', "Erro ao processar pagamento [{$xml->error->code}]: {$xml->error->message}" );
          }
          $transaction = TransactionController::transactionFromXml($xml);
          
          $anuncio->transaction_id = $transaction->id;
          $anuncio->patrocinado = true;
          $anuncio->ativo = false;
          $anuncio->save();
          if($transaction->paymentLink){
              $this->notify(new PaymentRequest($anuncio));  
          }
          if($request->has('video')){
            $link = $request->input('video');
            if(!empty($link)){
              $video = new Video();
              $video->link = $request->input('video');
              $video->anuncio_id = $anuncio->id;
              $video->isHomeVideo = false;
              $video->user_id = $anuncio->user;
              $video->save();  
            }
          } 
          return redirect("{$title}")->with('status', 'Anúncio publicado, porém só será exibido após a confirmação do seu pagamento.');
        }
        $request->flash();
        return redirect('/anuncie')->with('status', 'Você precisa inserir no mínimo uma imagem para publicar o seu anúncio');
    }

    private function insertAditionalData(Request $request, $id){
      $ad = new AnuncioDados();
      $ad->nome = "cambio";
      $ad->valor = $request->input('cambio');
      $ad->anuncio = $id;
      $ad->save();
      $ad = new AnuncioDados();
      $ad->nome = "portas";
      $ad->valor = $request->input('portas');
      $ad->anuncio = $id;
      $ad->save();
      $ad = new AnuncioDados();
      $ad->nome = "combustivel";
      $ad->valor = $request->input('combustivel');
      $ad->anuncio = $id;
      $ad->save();
    }

    public function desabilitar(Request $request, $id){
      $anuncio = Anuncio::find($id);
      $transaction = $anuncio->transaction;
      if($transaction){
        if(Auth::user()->id == $anuncio->user && $transaction->status == 3){
          $anuncio->ativo = !$anuncio->ativo;
          $anuncio->save();
        }elseif($transaction->status != 3){
          Flash::warning('O pagamento do anúncio ainda não foi confirmado');
        }
      }
      return redirect()->back();
    }

    private function insertAdicionaisAnuncio(Request $request, $anuncio){
      if($request->has('opcionais')){
        $adicionais = $request->input('opcionais');
        foreach ($adicionais as $a) {
          if($a != ''){
            $adicional = new Adicional();
            $adicional->nome = $a;
            $adicional->anuncio = $anuncio->id;
            $adicional->save();
          }
        }
      }
    }

    private function insertAcessoriosAnuncio(Request $request, $anuncio){
      if($request->has('acessorios')){
        $adicionais = $request->input('acessorios');
        foreach ($adicionais as $a) {
          if($a != ''){
            $acessorio = new Acessorio();
            $acessorio->nome = $a;
            $acessorio->anuncio = $anuncio->id;
            $acessorio->save();
          }
        }
      }
    }

    private function insertAnuncioDados(Request $request){
      foreach(AnuncioField::all() as $field){
        //Enquanto encontro fields crio os metadados do anuncio (AnuncioDados)
        $data = new AnuncioDados();
        $data->nome = $field->meta_nome;
        $data->valor = $request->input($field->meta_nome); //Pego o valor
        $data->anuncio = $anuncio->id;
        $data->save();
      }
    }

    //Corrigir erro aqui!
    private function insertImagesAnuncio($anuncio, $imagens){
      foreach($imagens as $img){
        $img_anuncio = new AnuncioImagem();
        $img_anuncio->imagem= Imagem::where('url', str_replace("\"", "", $img))->first()->id;
        $img_anuncio->first= false;
        $img_anuncio->anuncio= $anuncio->id;
        $img_anuncio->save();
      }
    }

    public function anuncios(Request $request){
      $paginacao = $request->input('paginate')?intval($request->input('paginate')):20;
      $data = $request->all();
      unset($data['page']);
      $marca_detected = null;
      $modelo_detected = null;
      if(!empty($data)){
        $filter = $this->filter_search($data);
        $m_buscados = $request->input('mais_buscados'); //ordem por número de visualizações
        $anuncios = Anuncio::
            where($filter[0])
            ->join('anuncio_dados', 'anuncio_dados.anuncio', '=', 'anuncios.id')
            /*->join('anuncio_dados', function($join) use($request) {
                $join->on('anuncio_dados.anuncio', '=', 'anuncios.id')
                      ->where([
                        ['anuncio_dados.nome', '=', 'Cor'],
                        ['anuncio_dados.valor', 'like', '%'.$request->input('cor').'%']
                      ])
                      ->orWhere([
                        ['anuncio_dados.nome', '=', 'Cambio'],
                        ['anuncio_dados.valor', 'like', '%'.$request->input('cambio').'%']
                      ]);
            })*/
            ->whereRaw("anuncio_dados.nome = 'cambio' && anuncio_dados.valor like '%{$request->input('cambio')}%'")
            //->whereRaw("anuncio_dados.nome = 'cor' && anuncio_dados.valor like '%{$request->input('cor')}%'")
            ->whereIn('moto', $filter[1]['tipos'])
            ->whereIn('usado', isset($filter[1]['usado'])?$filter[1]['usado']:array(0,1))
            ->whereIn('blindagem', isset($filter[1]['blindagem'])?$filter[1]['blindagem']:array(0,1))
            ->orderBy('patrocinado', 'desc')
            ->orderBy($request->input('order')?$request->input('order'):'id', 'desc')
            ->select('anuncios.*')
            ->paginate($paginacao);
      }else{
        $anuncios = Anuncio::where('ativo', true)
        ->orderBy('patrocinado', 'desc')
        ->orderBy($request->input('order')?$request->input('order'):'id', 'desc')
        ->paginate($paginacao);
      }
      $request->flash();
      return view('anuncios.anuncios')->with(['anuncios'=> $anuncios,
       'marca_detected'=> $marca_detected, 'modelo_detected'=> $modelo_detected
      ]);
    }

    private static function extractMarca($titulo){
      if(!empty($e)){
        $e = explode($titulo, ' ');
        foreach ($e as $word) {
          if($marca = Marca::where('nome', "%$word%")->first()){
            return $marca->id;
          }
        }
      }
      return null;
    }

    private static function extractModelo($titulo){
      if(!empty($e)){
        $e = explode($titulo, ' ');
        foreach ($e as $word) {
          if($modelo = Modelo::where('nome', "%$word%")->first()){
            return $modelo->id;
          }
        }
      }
      
      return null;
    }

    public static function filter_search($data){
      $param = array();
      $details = array();
      $param[] = ['ativo', '=', '1'];
      $except = array('mais_buscados', 'order', 'paginate', 'cambio', 'cor');
      foreach ($data as $key=>$value) {
        if($value && !in_array($key, $except)/*$key != 'mais_buscados' && $key != 'order' && $key != 'paginate'*/){
          if(strpos($key, '_maximo')){
            $exploded = explode("_", $key);
            $value = str_replace([',','.'], '', $value);
            $param[] = [$exploded[0], '<=', $value];
          }elseif(is_array($value)) {
            //Quando cair aqui eu subentendo que é tipo[]
            foreach ($value as $_key => $_value) {
              if($key == 'tipo'){
                $details['tipos'][] = $_value=='carro'? 0:1;
              }elseif($key == 'blindagem'){
                $details['blindagem'][] = $_value;
              }elseif($key == 'usado') {
                $details['usado'][] = $_value;
              }
            }
          }elseif(strpos($key, '_minimo')){
            $exploded = explode("_", $key);
            $value = str_replace([',','.'], '', $value);
            $param[] = [$exploded[0], '>=', $value];
          }else{
            $prefix = is_numeric($value)?'':'%';
            $param[] =  [$key, is_numeric($value)? '=':'like', $prefix.strtoupper($value).$prefix];
          }
        }
      }
      if(isset($data['titulo'])){
        if($marca = AnuncioController::extractMarca($data['titulo'])){
          $param['marca'] = $marca;
        }
      
        if($modelo = AnuncioController::extractModelo($data['titulo'])){
          $param['modelo'] = $modelo;
        }  
      }
      return [$param, $details];
    }

    public function view(Request $request, $tipo, $marca, $modelo, $versao, $titulo, $ano, $blindado, $id){
      $anuncio = Anuncio::find($id);
      if($tipo != 'anuncios'){
        if(!$anuncio->users->isRevenda()){
          return redirect('/');
        }
      }else{
        if($anuncio->users->isRevenda()){
          return redirect('/');
        }
      }
      $anuncio->visualizacoes += 1;
      $anuncio->save();
      $url = AnuncioImagem::where([['anuncio', $anuncio->id], ['first', true]])->first();
      $url = $url?AnuncioImagem::where([['anuncio', $anuncio->id], ['first', true]])->first()->url : '';
      if(!$anuncio->importado){
          $principal = Storage::url($url);
      }else{
          $principal = $url;
      }
      $imagens = array();
      $result = AnuncioImagem::where([
                                ['anuncio', $anuncio->id],
                                ['first', false]
                              ])->get();
      foreach($result as $r){
        if(!$anuncio->importado)
          $imagens[] = Storage::url(Imagem::find($r->imagem)->url);
        else
          $imagens[] = Imagem::find($r->imagem)->url;
      }
      $dados = AnuncioDados::where([
        ['anuncio', '=', $anuncio->id],
        ['visible', '=', true]
      ])->get();
      $adicionais = Adicional::where('anuncio', $anuncio->id)->get();
      $acessorios = Acessorio::where('anuncio', $anuncio->id)->get();
      $view = new VisualizacaoAnuncio();
      $view->user = Auth::check()? Auth::user()->id:'0';
      $view->anuncio = $anuncio->id;
      $view->save();
      $revenda = $anuncio->users->isRevenda();
      $count = Anuncio::count();
      $relacionados = array();
      if ($revenda) {
        $myCount = Anuncio::where('user', $anuncio->users->id)->count();
        $relacionados = Anuncio::where('user', $anuncio->users->id)->get()->random($myCount < 4?$myCount:4);
      }else{
        $relacionados = Anuncio::where([['id', '!=', $anuncio->id]])->get()->random($count < 4?$count:4);
      }
      

      return view('anuncios.anuncio_page')
        ->with(
          [
            'acessorios' => $acessorios, 'adicionais' => $adicionais, 'anunciodados'=> $dados,
            'anuncio'=> $anuncio, 'imagens' => $imagens, 'principal' => $anuncio->urlImagemFirst(),
            'relacionados'=> $relacionados, 'shares' => $this->sharedLinks($anuncio)
          ]
        );
    }

    public function inativo(Request $request, $id){
      $anuncio = Anuncio::find($id);
      return view('anuncios.inativo')->with('anuncio', $anuncio);
    }

    private function sharedLinks(Anuncio $anuncio){
      $local = env('APP_URL');
      return [
        'facebook' => '<a href="http://facebook.com/share.php?u='.$local.'/'.$anuncio->getUrl().'&amp;t='.$anuncio->titulo.
                      ' target="_blank" title="Compartilhar '.$local.'/'.$anuncio->titulo.' no Facebook">Facebook</a>',
        'twitter' => '<a href="http://twitter.com/intent/tweet?text='.$anuncio->titulo.'&url='.$local.'/'.$anuncio->getUrl().'" title="Twittar sobre '.$anuncio->titulo.'" target="_blank">Twitter</a>'
      ];
    }

    public function admin(Request $request){
      $anuncios = Anuncio::orderBy('id', 'desc')->paginate(50);
      return view('anuncios.index')->with('anuncios', $anuncios);
    }

    public function changeStatus(Request $request){
      $anuncio = Anuncio::find($request->input('anuncio'));
      $anuncio->ativo = !$anuncio->ativo;
      $anuncio->save();
      return response()->json('Status modificado com sucesso!');
    }

    private function searchByMarcaName($nome){
      $nomes = explode(" ", $nome);
      foreach($nomes as $n){
        if($marca = Marca::where('nome', $n)->first()){
          return $marca->id;
        }
      }
    }

    public function routeNotificationForMail()
    {
        return Auth::user()->email;
    }

}
