<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\UserDado;
use App\Notification\EmailConfirmation;
use Auth;
use Flash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use Notifiable;

    private $user;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'documento' => 'bail|required|unique:users|'. count($data['documento']) > 14? 'cnpj':'cpf',
            'pessoa_fisica' => 'required',
            'celular' => 'required|celular_com_ddd',
            'g-recaptcha-response' => 'required|captcha',
            'whatsapp' => 'required|celular_com_ddd'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'documento' => $data['documento'],
            'pessoa_fisica' => $data['pessoa_fisica'],
            'confirm_account' => User::generateToken(),
            'ativo'=> false
        ]);
        $dado = new UserDado();
        $dado->nome = 'telefone';
        $dado->valor= $data['celular'];
        $dado->user = $user->id;
        $dado->save();
        $whatsapp = new UserDado();
        $whatsapp->nome = 'whatsapp';
        $whatsapp->valor = $data['whatsapp'];
        $whatsapp->user = $user->id;
        $whatsapp->save();
        $this->notify(new EmailConfirmation($user));
        return $user;
    }

    public function routeNotificationForMail()
    {
        return $this->user->email;
    }

}
