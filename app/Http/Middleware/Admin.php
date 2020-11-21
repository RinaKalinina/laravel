<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->getUser()->isAdmin()) {
            return $next($request);
        }

        abort(403, 'Access denied');
    }
}
