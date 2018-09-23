<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisualizacaoDados;

class VisualizacaoDadosController extends Controller
{
    public function store(Request $request){
      $data = $request->all();
      VisualizacaoDados::create($data);
      return response()->json('Informações carregadas');
    }
}
