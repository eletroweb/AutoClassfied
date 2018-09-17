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
      //var_dump($file);exit;
      $img = new Imagem();
      $img->url= Storage::put('public', $file[0]);
      $img->save();
      return response()->json($img->url);
    }
    return response()->json(false);
  }
}
