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

class AnuncioController extends Controller
{
    public function anuncie(Request $request){
      return view('anuncios.anuncie');
    }

    public function anuncieStore(Request $request){
        //var_dump($request->all());exit;
        $validatedData = $request->validate([
           'nome' => 'required|max:30',
           'marca' => 'required',
           'modelo' => 'required',
           'versao' => 'required',
           'valor' => 'required',
           'descricao' => 'required',
           'user' => 'required',
           'ano'=> 'required',
           'moto' => '',
           'km'=> 'required',
           'usado'=> '',
           'cambio'=> 'required'
        ]);
        $user = $request->input('user');
        if(Auth::user()->id != intval($user)){
          return redirect('/anuncie')->with('status', 'Você está trapaceando para publicar este anúncio');
        }
        if($request->has('imagens')){
          $imagens = $request->input('imagens');
          $anuncio = Anuncio::create($validatedData);
          $img_principal = new AnuncioImagem();
          $img_principal->imagem= Imagem::where('url', str_replace("\"", "", $imagens[0]))->first()->id;
          $img_principal->anuncio= $anuncio->id;
          $img_principal->first= true;
          $img_principal->save();
          $ad = new AnuncioDados();
          $ad->nome = "cambio";
          $ad->valor = $request->input('cambio');
          $ad->anuncio = $anuncio->id;
          $ad->save();
          $ad = new AnuncioDados();
          $ad->nome = "portas";
          $ad->valor = $request->input('portas');
          $ad->anuncio = $anuncio->id;
          $ad->save();
          $ad = new AnuncioDados();
          $ad->nome = "combustivel";
          $ad->valor = $request->input('combustivel');
          $ad->anuncio = $anuncio->id;
          $ad->save();
          if($request->has('adicionais')){
            $adicionais = $request->input('adicionais');
            foreach ($adicionais as $a) {
              if($a != ''){
                $adicional = new Adicional();
                $adicional->nome = $a;
                $adicional->anuncio = $anuncio->id;
                $adicional->save();
              }
            }
          }
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

          foreach($imagens as $img){
            $img_anuncio = new AnuncioImagem();
            $img_anuncio->imagem= Imagem::where('url', str_replace("\"", "", $img))->first()->id;
            $img_anuncio->first= false;
            $img_anuncio->anuncio= $anuncio->id;
            $img_anuncio->save();
          }

          //Percorro todos os fields do anuncio e procuro pelo input correspondente a ele.
          foreach(AnuncioField::all() as $field){
            //Enquanto encontro fields crio os metadados do anuncio (AnuncioDados)
            $data = new AnuncioDados();
            $data->nome = $field->meta_nome;
            $data->valor = $request->input($field->meta_nome); //Pego o valor
            $data->anuncio = $anuncio->id;
            $data->save();
          }
          $title = $anuncio->getNomeFormatted();
          return redirect("/anuncios/$title_$anuncio->id")->with('status', 'Anúncio publicado com sucesso!');
        }
        $request->flash();
        return redirect('/anuncie')->with('status', 'Você precisa inserir no mínimo uma imagem para publicar o seu anúncio');
    }

    public function anuncios(Request $request){
      if($data = $request->all()){
        //$tipos = array();
        //var_dump($data);exit;
        $filter = $this->filter_search($data);
        //var_dump($filter[1]);exit;
        $m_buscados = $request->input('mais_buscados'); //ordem por número de visualizações
        $anuncios = Anuncio::where($filter[0])
            ->whereIn('moto', $filter[1])
            ->orderBy($request->input('order')?$request->input('order'):'id', 'desc')
            ->paginate($request->input('paginate')?intval($request->input('paginate')):20);
      }else{
        $anuncios = Anuncio::orderBy($request->input('order')?$request->input('order'):'id', 'desc')
          ->paginate($request->input('paginate')?intval($request->input('paginate')):20);
      }
      return view('anuncios.anuncios')->with('anuncios', $anuncios);
    }

    public static function filter_search($data){
      $param = array();
      $tipos = array();
      foreach ($data as $key=>$value) {
        if($value && $key != 'mais_buscados' && $key != 'order' && $key != 'paginate'){
          if(strpos($key, '_maximo')){
            $exploded = explode("_", $key);
            $value = str_replace([',','.'], '', $value);
            $param[] = [$exploded[0], '<=', $value];
          }elseif(is_array($value)) {
            //Quando cair aqui eu subentendo que é tipo[]
            foreach ($value as $_key => $_value) {
              //$prefix = is_numeric($_value)?'':'%';
              //$param[] =  ['tipo', is_numeric($_value)? '=':'like', $prefix.strtoupper($_value).$prefix];
              $tipos[] = $_value=='carro'? 0:1;
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
      return [$param, $tipos];
    }

    public function index(Request $request, $nome, $id){
      $anuncio = Anuncio::find($id);
      $anuncio->visualizacoes += 1;
      $anuncio->save();
      $url = AnuncioImagem::where([['anuncio', $anuncio->id], ['first', true]])->first()->url;
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
      //var_dump($count);exit;
      if($count > 1){
        $relacionados = 
          $revenda?
          Anuncio::where('user', $anuncio->users->id)->get()->random($count < 4?$count:4)
          :
          Anuncio::where([['id', '!=', $anuncio->id]])->get()->random($count < 4?$count:4);  
      }
      
      return view('anuncios.anuncio_page')->with(['acessorios' => $acessorios, 'adicionais' => $adicionais, 'anunciodados'=> $dados,
            'anuncio'=> $anuncio, 'imagens' => $imagens, 'principal' => $imagens[0], 'relacionados'=> $relacionados]);
    }

}
