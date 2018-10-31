<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;

class ContatoController extends Controller
{
    public function store(Request $request){
      Contato::create($request->all());
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
