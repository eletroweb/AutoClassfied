<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'pessoa_fisica', 'documento'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function telefone(){
      return UserDado::where([
          ['nome', '=', 'telefone'],
          ['user', '=', $this->id]
        ])->first();
    }

    public function anuncios(){
        return $this->hasMany('App\Anuncio', 'user');
    }

    public function isAdmin(){
      return true;
    }

    public function isRevenda(){
      return Revenda::where('user', $this->id)->first();
    }

    public function end(){
        return $this->hasOne('App\Endereco', 'id', 'endereco');
    }

}
