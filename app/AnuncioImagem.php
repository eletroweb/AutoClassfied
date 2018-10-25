<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnuncioImagem extends Model
{

    public function imagems(){
      return $this->belongsTo('App\Imagem', 'imagem');
    }

}
