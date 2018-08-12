<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenda extends Model
{
    protected $fillable = ['razaosocial', 'nomefantasia', 'user', 'cnpj', 'ativo', 'endereco'];

    public function end(){
      return $this->hasOne('App\Endereco', 'id', 'endereco');
    }
}
