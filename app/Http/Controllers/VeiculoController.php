<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\Modelos;
use App\Versao;
use App\Anuncio;
use Illuminate\Support\Facades\DB;

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
      }
      return response()->json("Atualizado com sucesso!");
    }

    public function getMarcas(Request $request){
      $usadas = Anuncio::join('marcas', 'marcas.id', '=', 'anuncios.marca')
                    ->select([DB::raw('count(*) as quantidade'), 'marcas.nome', 'marcas.id'])
                    ->orderByRaw('quantidade DESC')
                    ->groupBy('anuncios.marca')
                    //->having('quantidade', '>=', '0')
                    ->get();
      $except = array();
      foreach ($usadas->all() as $m) {
        $except[] = $m->id;
      }
      $marcas = Marca::whereNotIn('id', $except)->get(); //Pego todas as marcas com exceção das marcas que já tenho
      $marcas = $usadas->merge($marcas);
      return response()->json($marcas);
    }

    public function getModelos(Request $request){
      return response()->json(Modelos::where('marca', $request->input('marca'))->select('nome', 'id')->get());
    }

    public function getVersoes(Request $request){
      return response()->json(Versao::where('modelo', $request->input('modelo'))->select('nome', 'id')->get());
    }
}
