<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Anuncio;

class ContatoAnuncio extends Model
{
    protected $fillable = ['nome', 'email', 'mensagem', 'telefone', 'anuncio',
                           'contato_whatsapp', 'desejo_financiamento', 'veiculo_troca'];

    public function getAnuncio(){
      return Anuncio::find($this->anuncio);
    }

}
