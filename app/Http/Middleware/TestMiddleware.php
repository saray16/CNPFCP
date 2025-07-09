<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        \Log::info('TestMiddleware ejecutadooooo'); // Esto dejará un registro en el log
        return $next($request);
    }
}
