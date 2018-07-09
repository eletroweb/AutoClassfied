<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{

    protected $fillable = ['nome'];
    public static $rules = [];

    public function modelos(){
        return $this->hasMany('App\Modelo');
    }
}
