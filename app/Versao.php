<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Versao extends Model
{
    public function modelo(){
      return $this->belongsTo('App\Modelo');
    }
}
