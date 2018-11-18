<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnuncioDados extends Model
{
    protected $fillable = ['nome', 'valor', 'anuncio'];
}
