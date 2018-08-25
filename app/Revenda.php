<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenda extends Model
{

    protected $fillable = ['razaosocial', 'nomefantasia', 'user', 'cnpj', 'ativo', 'endereco', 'destaques'];

    public function end(){
      return $this->hasOne('App\Endereco', 'id', 'endereco');
    }

    public function usuario(){
      return $this->hasOne('App\User', 'id', 'user');
    }
}
