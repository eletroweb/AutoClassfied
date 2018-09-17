<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complemento extends Model
{
    protected $fillable = ['nome', 'anuncio', 'visible'];
}
