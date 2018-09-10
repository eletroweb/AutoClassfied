<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PagseguroController extends Controller
{

    public function startSession(Request $request){
      $http = new Client();
      $email = env('PAGSEGURO_EMAIL', 'PAGSEGURO_EMAIL');
      $token = env('PAGSEGURO_TOKEN', 'PAGSEGURO_TOKEN');
      $response = $http->request('POST', "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions/?email=$email&token=$token");
      $xml = simplexml_load_string($response->getBody());
      return response()->json($xml->id);
    }

}
