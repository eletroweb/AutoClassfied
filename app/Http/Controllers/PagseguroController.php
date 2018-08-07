<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;

class PagseguroController extends Controller
{
   
    public function startSession(Request $request){
      $credencial = Option::where('nome', 'credencial_pagseguro')->first()->valor;
      //$credenciais = 'Virão do banco de dados';
      $opts = array('http' =>
                  array(
                      'method'  => 'POST',
                      'header'  => 'Content-type: application/x-www-form-urlencoded',
                  )
              );
      $xml = simplexml_load_string(file_get_contents("https://ws.pagseguro.uol.com.br/v2/sessions?{$credencial}", false, $opts));
      return view('transacao.index')->with('xml', $xml);
    }
}
