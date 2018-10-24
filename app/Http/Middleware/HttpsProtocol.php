<?php

namespace App\Http\Middleware;

use Closure;

class HttpsProtocol
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
        if(strcmp(env('APP_ENV'), 'production') == 0){
          if (!$request->secure()) {
              return redirect()->secure($request->getRequestUri());
          }
        }
        return $next($request);
    }
}
