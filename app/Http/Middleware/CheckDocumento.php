<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Flash;

class CheckDocumento
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
        if(Auth::user()->documento)
          return $next($request);
        else {
          Flash::warning('Você precisa cadastrar o seu CPF/CNPJ para publicar um anúncio');
          return redirect(route('configuracoes_conta'));
        }
    }
}
