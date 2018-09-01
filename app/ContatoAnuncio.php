<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContatoAnuncio extends Model
{
    protected $fillable = ['nome', 'email', 'mensagem', 'telefone', 'anuncio',
                           'contato_whatsapp', 'desejo_financiamento', 'veiculo_troca'];

}
