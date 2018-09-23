<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisualizacaoDados extends Model
{
    protected $fillable = ['user_id', 'anuncio_id'];

    public function anuncio(){
      return $this->belongsTo('App\Anuncio');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

}
