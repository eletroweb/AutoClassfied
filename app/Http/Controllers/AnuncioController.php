<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use App\AnuncioDados;
use App\AnuncioField;
use App\AnuncioImagem;
use Illuminate\Support\Facades\Storage;

class AnuncioController extends Controller
{
    public function anuncie(Request $request){
      return view('anuncios.anuncie');
    }

    public function anuncieStore(Request $request){
        $validatedData = $request->validate([
           'nome' => 'required|max:30',
           'veiculo' => 'required',
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
          ['nome', 'like', '%'.$request->input('search').'%'],
        ])->orderBy('id', 'desc')->paginate(20);
      }else{
        $anuncios = Anuncio::orderBy('id', 'desc')->paginate(20);
      }
      return view('anuncios.anuncios')->with('anuncios', $anuncios);
    }

    public function index(Request $request, $id){
      $anuncio = Anuncio::find($id);
      $principal = Storage::url(AnuncioImagem::where([['anuncio', $anuncio->id], ['first', true]])->first()->url);
      $imagens = array();
      $result = AnuncioImagem::where([
                                        ['anuncio', $anuncio->id],
                                        ['first', false]
                                      ])->get();
      foreach($result as $r){
        $imagens[] = Storage::url($r->url);
      }
      return view('anuncios.anuncio_page')->with(['anuncio'=> $anuncio, 'imagens' => $imagens, 'principal' => $principal]);
    }
}
//http://dev-jsantosclass54983.codeanyapp.com/
