<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use App\AnuncioDados;
use App\AnuncioField;
use App\AnuncioImagem;
use App\VisualizacaoAnuncio;
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
           'user' => 'required'
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
      if($request->has('search')){
        $anuncios = Anuncio::where([
          ['anuncios.nome', 'like', '%'.$request->input('search').'%'],
          ['anuncios.marca', 'like', '%'.$request->input('marca').'%'],
          ['anuncios.modelo', 'like', '%'.$request->input('modelos').'%'],
          ['anuncios.versao', 'like', '%'.$request->input('versao').'%'],
        ])->orderBy('id', 'desc')->paginate(20);
      }else{
        $anuncios = Anuncio::orderBy('id', 'desc')->paginate(20);
      }
      return view('anuncios.anuncios')->with('anuncios', $anuncios);
    }

    public function index(Request $request, $id){
      $anuncio = Anuncio::find($id);
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
      $view = new VisualizacaoAnuncio();
      $view->user = Auth::check()? Auth::user()->id:'';
      $view->anuncio = $anuncio->id;
      $view->save();
      return view('anuncios.anuncio_page')->with(['anuncio'=> $anuncio, 'imagens' => $imagens, 'principal' => $principal]);
    }



}
