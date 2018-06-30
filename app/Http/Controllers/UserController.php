<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Anuncio;

class UserController extends Controller
{

    public function profile(Request $request){
      $user = Auth::user();
      return view('user.home')->with(['user'=> $user]);
    }

    public function meus_anuncios(Request $request){
      $user = Auth::user();
      $anuncios = Anuncio::where('user', $user->id)->paginate(5);
      return view('user.meusanuncios')->with('anuncios', $anuncios);
    }

    public function fale_conosco(Request $request){
      return view('fale_conosco');
    }

}
