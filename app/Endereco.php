<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['bairro', 'cep', 'uf', 'cidade', 'logradouro', 'numero'];
}
