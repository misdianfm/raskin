<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->level == "Kepaladesa") {
            return redirect('/home');
        }

        return $next($request);
    }
}
