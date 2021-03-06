<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use App\Marca;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $recentes = Anuncio::where('ativo', true)->orderBy('id', 'desc')->get();
        if(!$recentes->isEmpty()){
            $recentes = $recentes->random(10);
        }
        $marcas = Marca::all();
        return view('home')->with(['recentes' => $recentes, 'home'=>true, 'marcas'=> $marcas]);
    }
}
