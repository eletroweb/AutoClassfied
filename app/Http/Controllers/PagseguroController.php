<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagseguroController extends Controller
{
    public function startSession(Request $request){
      $credenciais = 'Virão do banco de dados';
      $opts = array('http' =>
                  array(
                      'method'  => 'POST',
                      'header'  => 'Content-type: application/x-www-form-urlencoded',
                  )
              );
      $xml = simplexml_load_string(file_get_contents("https://ws.pagseguro.uol.com.br/v2/sessions?{$credenciais}", false, $opts));
      return view('transacao.index')->with('xml', $xml);
    }
}
