<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $fillable = ['nome', 'descricao', 'veiculo', 'valor'];

    public function anuncio_dados(){
        return $this->hasMany('App\AnuncioDados');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
