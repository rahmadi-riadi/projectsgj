<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasRole(['admin', 'superadmin'])) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Unauthorized.');
    }
}
