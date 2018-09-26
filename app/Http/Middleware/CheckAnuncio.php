<?php

namespace App\Http\Middleware;

use Closure;
use App\Anuncio;
use Illuminate\Support\Facades\Auth;

class CheckAnuncio
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data= $request->url();
        $data= explode("/", $data);
        $anuncio = Anuncio::findOrFail($data[10]);
        if(Auth::check()){
          if(!$anuncio->ativo && $anuncio->user == Auth::user()->id || $anuncio->ativo){
              return $next($request);
          }else{
              return redirect(route('anuncio_inativo', ['anuncio'=> $anuncio]));
          }
        }else{
          if(!$anuncio->ativo && $anuncio->user == Auth::user()->id || $anuncio->ativo){
              return $next($request);
          }
        }
    }
}
