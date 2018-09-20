<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Option;

class Option extends Model
{
    public static function getOption($nome){
      return Option::where('nome', $nome)->first();
    }

    public static function getOptionValor($nome){
      $option = Option::where('nome', $nome)->first();
      return $option?$option->valor:'';
    }

}
