<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $recentes = Anuncio::orderBy('id', 'desc')->paginate(10);
        return view('home')->with(['recentes' => $recentes, 'home'=>true]);
    }
}
