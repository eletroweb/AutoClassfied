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
        'name', 'email', 'password', 'pessoa_fisica', 'documento', 'provider', 'provider_id', 'confirm_account', 'ativo'
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

    public function geneateToken($length = 25) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
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

    public function dados(){
      return $this->hasMany('App\UserDado', 'user');
    }

    public function whatsapp(){
      $whatsapp = UserDado::where([
        ['nome', '=', 'whatsapp'],
        ['user', '=', $this->id]
      ])->first();
      if(!$whatsapp){
        return false;
      }else{
        return $whatsapp->valor;
      }
    }

}
