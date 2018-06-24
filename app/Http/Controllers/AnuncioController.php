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
        $validatedData = $request->validate([
           'nome' => 'required|max:30',
           'veiculo' => 'required',
           'valor' => 'required',
           'descricao' => 'required',
        ]);
        $anuncio = Anuncio::create($validatedData);
        //Percorro todos os fields do anuncio e procuro pelo input correspondente a ele.
        foreach(AnuncioField::all() as $field){
          //Enquanto encontro fields crio os metadados do anuncio (AnuncioDados)
          $data = new AnuncioDados();
          $data->nome = $field->meta_nome;
          $data->valor = $request->input($field->meta_nome); //Pego o valor
          $data->anuncio = $anuncio->id;
          $data->save();
        }
        return redirect('home')->with('status', 'Anúncio publicado com sucesso!');
    }

    public function anuncios(){
      $anuncios = Anuncio::orderBy('id', 'desc')->paginate(20);
      return view('anuncios.anuncios')->with('anuncios', $anuncios);
    }
}
//http://dev-jsantosclass54983.codeanyapp.com/
