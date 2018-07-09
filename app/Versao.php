<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Versao extends Model
{

    protected $fillable = ['nome', 'modelo'];
    public static $rules = array();

    public function modelo(){
      return $this->belongsTo('App\Modelo');
    }
}
