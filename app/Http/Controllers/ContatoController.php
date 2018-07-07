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

}
