<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    //Este método
    public function updateVeiculos(Request $request){
      //$result = file_get_contents();
      $url = 'http://xml.dsautoestoque.com/?l=22741269000161&amp;v=2';
      $result = simplexml_load_string(file_get_contents($url));
      foreach ($result as $r) {
        var_dump($r);
      }
      exit;
    }
}
