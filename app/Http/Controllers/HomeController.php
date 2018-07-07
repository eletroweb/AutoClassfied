<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $recentes = Anuncio::orderBy('id', 'desc')->paginate(10);
        return view('home')->with(['recentes' => $recentes]);
    }
}
