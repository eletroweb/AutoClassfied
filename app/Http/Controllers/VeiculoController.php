<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\Modelos;
use App\Versao;

class VeiculoController extends Controller
{
    //Este método
    public function importMarcaModelos(Request $request){
      $url = 'http://xml.dsautoestoque.com/?hash=5p+UkKQuVSo9E4p4AitRiRWDPsw=';
      $result = simplexml_load_string(file_get_contents($url));
      foreach ($result as $r) {
        $marca = Marca::where('nome', $r->marca)->first();
        if(!$marca){
          $marca = new Marca();
          $marca->nome = $r->marca;
          $marca->save();
        }
        foreach($r->modelos as $m){
          if($m->item->modelo != ''){
            $modelo = Modelos::where([
                ['nome', $m->item->modelo],
                ['marca', $marca->id]
            ])->first();
            if(!$modelo){
              $modelo = new Modelos();
              $modelo->marca = $marca->id;
              $modelo->nome = $m->item->modelo;
              $modelo->save();
            }
          }
          if($m->item->versoes)
          foreach ($m->item->versoes as $v) {
            if($v->item->versao != ''){
              $versao = Versao::where([
                  ['nome', $v->item->versao],
                  ['modelo', $modelo->id]
              ])->first();
              if(!$versao){
                $versao = new Versao();
                $versao->nome = $v->item->versao;
                $versao->modelo = $modelo->id;
                $versao->save();
              }
            }
          }
        }
        //Marca::create($r->marca);
      }
      return redirect('/anuncios');
    }
}
