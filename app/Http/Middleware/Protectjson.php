<?php

namespace App\Http\Middleware;

use Closure;

class Protectjson
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
        if(!$request->wantsJson()) {
            abort(403, 'acceso no autorizado');
        }else {
            return $next($request);
        }
       
    }
}
