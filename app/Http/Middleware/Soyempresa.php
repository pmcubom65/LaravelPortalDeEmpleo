<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Soyempresa
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
        if (Auth::user() && Auth::user()->rol_id===2) {
            return $next($request);
 
        } else {
            abort(403, 'acceso no autorizado');
        }
        
    }
}
