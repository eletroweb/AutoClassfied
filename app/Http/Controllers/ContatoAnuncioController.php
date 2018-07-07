<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContatoAnuncio;

class ContatoAnuncioController extends Controller
{
    public function store(Request $request){
      ContatoAnuncio::create($request->all());
      return redirect('/anuncios/'.$request->input('anuncio'))->with('status', 'Contato enviado com sucesso! Aguarde o retorno do anunciante.');
    }
}
