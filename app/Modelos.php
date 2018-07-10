<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    public static $rules = array();
    protected $fillable = ['nome', 'marca'];

    public function marca(){
      return $this->belongsTo('App\Marca');
    }
}
