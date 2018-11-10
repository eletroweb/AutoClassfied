<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;

class ContatoController extends Controller
{
    public function store(Request $request){
       $validated = $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'cpf' => 'required',
            'telefone' => 'required',
            'celular' => '',
            'mensagem' => 'required',
            'assunto' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);
      Contato::create($validated);
      return redirect('/fale-conosco')->with('status', 'Obrigado por entrar em contato conosco!');
    }

    public function index(Request $request){
      return view('fale_conosco');
    }

    public function admin(Request $request){
    	$contatos = collect();
    	if($s = $request->input('s')){
    		$contatos = Contato::where('email', 'like', '%'.$s.'%')->orderBy('id', 'desc')->paginate(10);	
    	}else{
    		$contatos = Contato::orderBy('id', 'desc')->paginate(10);	
    	}
    	return view('fale_conosco.index')->with('contatos', $contatos);
    }

}
