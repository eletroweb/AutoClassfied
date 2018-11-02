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
          'telefone' => '',
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

    public function index(Request $request){
      if($s = $request->input('s')){
        $contatos = ContatoAnuncio::join('anuncios', 'anuncios.id', '=', 'contato_anuncios.anuncio')
                                  ->where('anuncios.titulo', 'like', "%$s%")
                                  ->select(['anuncios.*', 'contato_anuncios.*'])
                                  ->orderBy('contato_anuncios.id', 'desc')->paginate(15);
        return view('contatos.index')->with('contatos', $contatos);
      }
      $contatos = ContatoAnuncio::orderBy('id', 'desc')->paginate(15);
      return view('contatos.index')->with('contatos', $contatos);
    }
}
