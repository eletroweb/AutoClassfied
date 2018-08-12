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

class AnuncioController extends Controller
{
    public function anuncie(Request $request){
      return view('anuncios.anuncie');
    }

    public function anuncieStore(Request $request){
        $validatedData = $request->validate([
           'nome' => 'required|max:30',
           'marca' => 'required',
           'modelo' => 'required',
           'versao' => 'required',
           'valor' => 'required',
           'descricao' => 'required',
           'user' => 'required',
           'moto' => ''
        ]);
        $anuncio = Anuncio::create($validatedData);
        $img_principal = new AnuncioImagem();
        $img_principal->url= Storage::put('public', $request->file('img_principal'));
        $img_principal->anuncio= $anuncio->id;
        $img_principal->first= true;
        $img_principal->save();
        if($request->hasFile('imagens')){
          $imgs = $request->file('imagens');
          foreach($imgs as $img){
            $img_anuncio = new AnuncioImagem();
            $img_anuncio->url= Storage::put('public', $img);
            $img_anuncio->first= false;
            $img_anuncio->anuncio= $anuncio->id;
            $img_anuncio->save();
          }
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
        return redirect('/anuncios/'.$anuncio->id)->with('status', 'Anúncio publicado com sucesso!');
    }

    public function anuncios(Request $request){
      if($data = $request->all()){
        $tipos = array();
        $param = $this->filter_search($data);
        $m_buscados = $request->input('mais_buscados'); //ordem por número de visualizações
        $anuncios = Anuncio::where($param)->whereIn('moto', $tipos)->orderBy($m_buscados =='1'? 'visualizacoes':'id' , 'desc')->paginate(20);
      }else{
        $anuncios = Anuncio::orderBy('id', 'desc')->paginate(20);
      }
      return view('anuncios.anuncios')->with('anuncios', $anuncios);
    }

    public static function filter_search($data){
      $param = array();
      foreach ($data as $key=>$value) {
        if($value && $key != 'mais_buscados'){
          if(strpos($key, '_maximo')){
            $exploded = explode("_", $key);
            $value = str_replace([',','.'], '', $value);
            $param[] = [$exploded[0], '<=', $value];
          }elseif(is_array($value)) {
            //Quando cair aqui eu subentendo que é tipo[]
            foreach ($value as $_key => $_value) {
              //$prefix = is_numeric($_value)?'':'%';
              //$param[] =  ['tipo', is_numeric($_value)? '=':'like', $prefix.strtoupper($_value).$prefix];
              $tipos[] = $_value=='carro'? false:true;
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
      return $param;
    }

    public function index(Request $request, $id){
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
          $imagens[] = Storage::url($r->url);
        else
          $imagens[] = $r->url;
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
      return view('anuncios.anuncio_page')->with(['acessorios' => $acessorios, 'adicionais' => $adicionais, 'anunciodados'=> $dados, 'anuncio'=> $anuncio, 'imagens' => $imagens, 'principal' => $principal]);
    }



}
