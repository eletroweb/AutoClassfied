<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use Flash;
use App\Revenda;
use Auth;
use Storage;
use App\Imagem;

class VideoController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        if(!$request->has('isHomeVideo'))
            $data['isHomeVideo'] = true;
        if($request->hasFile('thumbnail')){
          $file = $request->file('thumbnail');
          $img = new Imagem();
          $img->url= Storage::put('public', $file);
          $img->save();
          $data['thumbnail'] = $img->id;
        }
        $video = Video::create($data);
        Flash::success('Vídeo adicionado à sua galeria!');
        $revenda = Revenda::where('user', $data['user_id'])->firstOrFail();
        return redirect($revenda->getUrl());
    }

    public function index(Request $request, $nome, $cidade, $id){
        $revenda= Revenda::findOrFail($id);
        $videos = Video::where('user_id', $revenda->user)->paginate(30);
        return view('revendas.canal')->with('videos', $videos)->with('revenda', $revenda);
    }

    public function view(Request $request){
        return view('');
    }

    public function create(Request $request, $nome, $cidade, $id){
        $revenda = Revenda::findOrFail($id);
        if(Auth::user()->id == $revenda->user)
            return view('revendas.homepage.adicionar_video')->with(['revenda'=> $revenda, 'nome'=> $nome, 'cidade'=> $cidade]);
        else
            return redirect('/');
    }

}
