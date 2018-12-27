<?php

namespace App\Http\Middleware;

use Closure;
use App\Anuncio;
use Auth;

class isMyAnuncio
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
        $data = explode('/', $data);
        $anuncio = Anuncio::findOrFail($data[4]);
        if($anuncio->user == Auth::user()->id || Auth::user()->isAdmin()){
            return $next($request);
        }
        return redirect('/anuncios');
    }
}
