<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'pessoa_fisica', 'documento', 'provider', 'provider_id'
    ];

    //Péssima prática de programação
    private $adms = array(
        'jsantos.class@gmail.com',
        'juniorids1@hotmail.com',
        'rogerio.unicodono@gmail.com'
    );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function telefone(){
      $telefone = UserDado::where([
          ['nome', '=', 'telefone'],
          ['user', '=', $this->id]
        ])->first();
      return $telefone?$telefone->valor:'';
    }

    public function anuncios(){
        return $this->hasMany('App\Anuncio', 'user');
    }

    public function isAdmin(){
      return in_array($this->email, $this->adms);
    }

    public function isRevenda(){
      return Revenda::where('user', $this->id)->first();
    }

    public function end(){
        return $this->hasOne('App\Endereco', 'id', 'endereco');
    }

    public function sendPasswordResetNotification($token){
       $this->notify(new ResetPassword($token));
    }

}
