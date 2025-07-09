<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FacilitadorMiddleware
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->rol === 'facilitador') {
            return $next($request);
        }

        abort(403, 'Acceso no autorizado.');
    }
}
