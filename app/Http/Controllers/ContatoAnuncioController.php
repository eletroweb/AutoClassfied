<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContatoAnuncio;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoAnuncio as EmailAnuncio;

class ContatoAnuncioController extends Controller
{
    public function store(Request $request){
      $contato = ContatoAnuncio::create($request->all());
      Mail::to($contato->getAnuncio()->users)->send(new EmailAnuncio($contato));
      return redirect("/anuncios/{$contato->getAnuncio()->nome}".'_'.$contato->getAnuncio()->id)
              ->with('status', 'Contato enviado com sucesso! Aguarde o retorno do anunciante.');
    }
}
