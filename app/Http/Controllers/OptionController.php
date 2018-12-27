<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use App\Option;

class OptionController extends Controller
{

  public function update(Request $request){
    foreach ($request->all() as $key => $value) {
      $option = Option::where('nome', $key)->first();
      $option = $option? $option : new Option();
      $option->nome = $key;
      $option->valor = $value;
      $option->save();
    }
    Flash::success('Informações atualizadas com sucesso!');
    return redirect()->back();
  }

}
