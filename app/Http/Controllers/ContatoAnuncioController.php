<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContatoAnuncio;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoAnuncio as EmailAnuncio;
use Flash;

class ContatoAnuncioController extends Controller
{
    public function store(Request $request){
      $validatedData = $request->validate([
          'nome' => 'required',
          'email' => 'required',
          'mensagem' => 'required',
          'telefone' => 'required',
          'contato_whatsapp' => '',
          'desejo_financiamento' => '',
          'veiculo_troca' => '',
          'g-recaptcha-response' => 'required|captcha'
      ]);
      $contato = ContatoAnuncio::create($request->all());
      Mail::to($contato->getAnuncio()->users)->send(new EmailAnuncio($contato));
      Flash::success('Contato enviado com sucesso! Aguarde o retorno do anunciante.');
      return redirect($contato->getAnuncio()->getUrl());
    }
}
