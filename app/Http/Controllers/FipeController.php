<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FipeController extends Controller
{
    public function index(){
      return view('fipe.index');
    }
  
}
