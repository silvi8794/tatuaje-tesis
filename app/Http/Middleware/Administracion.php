<?php

namespace App\Http\Middleware;

use Closure;

class Administracion
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
        if ((auth()->check()) && (auth()->user()->tipouser_id == 1 || auth()->user()->tipouser_id == 2))
            return $next($request);

        return $next($request);
    }
}
