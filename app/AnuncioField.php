<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnuncioField extends Model
{
    public static $rules = array();
    protected $fillable = ['nome', 'meta_nome', 'type', 'place_holder', 'step', 'helpText'];
}
