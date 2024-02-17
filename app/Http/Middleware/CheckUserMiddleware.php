<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
          // Check if the user is authenticated
        //   if (auth()->check()) {
        //     return $next($request);
        // }
        if (session('user'))
            return $next($request);
        else
        // If not authenticated, you can redirect to the login page or do something else
        return redirect()->route('login');
    
    }
}
