<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagem;
use Illuminate\Support\Facades\Storage;

class ImagemController extends Controller
{
  public function imageUpload(Request $request){
    if($request->hasFile('imagem')){
      $file = $request->file('imagem');
      $urls = [];
      foreach($file as $f){
        $img = new Imagem();
        $img->url= Storage::put('public', $f);
        $img->save();
        $urls[] = $img->url;
      }
      return response()->json($urls);
    }
    return response()->json(false);
  }
}
