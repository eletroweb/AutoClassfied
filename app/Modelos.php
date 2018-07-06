<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    public function marca(){
      return $this->belongsTo('App\Marca');
    }
}
