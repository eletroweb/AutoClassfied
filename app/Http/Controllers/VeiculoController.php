<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    //Este método
    public function updateVeiculos(Request $request){
      $result = file_gets_content('http://xml.dsautoestoque.com/?hash=Tm/+qav0hOhGuEQN+QfYqKVQ8IY=&l=');
      foreach ($result as $r) {
        
      }
    }
}
