<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('user')) {
            return redirect('account/login');
        }

        return $next($request);
    }
}
