<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['link', 'anuncio_id', 'isHomeVideo', 'ativo', 'thumbnail', 'user_id'];

    public function anuncio(){
        return $this->belongsTo('App\Anuncio');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function thumb(){
    	return $this->belongsTo('App\Imagem', 'thumbnail');
    }

}
