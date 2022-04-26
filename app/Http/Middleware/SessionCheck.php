<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionCheck
{
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->has('loggedUser'))
        {
            return redirect('login');
        }
        return $next($request);
    }
}
