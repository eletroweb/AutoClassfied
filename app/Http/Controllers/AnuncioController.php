<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use App\AnuncioDados;
use App\AnuncioField;

class AnuncioController extends Controller
{
    public function anuncie(Request $request){
      return view('anuncios.anuncie');
    }
  
    public function anuncieStore(Request $request){
        $request->validate([
           'titulo' => 'required|max:30',
           'descricao' => 'required',
        ]);
        $anuncio = Anuncio::create($validatedData);
        //Percorro todos os fields do anuncio e procuro pelo input correspondente a ele.
        foreach(App\AnuncioField::all() as $field){
          //Enquanto encontro fields crio os metadados do anuncio (AnuncioDados)
          $data = new AnuncioDados();
          $data->nome = $field->meta_nome;
          $data->valor = $request->input($field->meta_nome); //Pego o valor
          $data->anuncio = $anuncio->id;
          $data->save();
        }
        return redirect('home')->with('status', 'Anúncio publicado com sucesso!');
    }
}
