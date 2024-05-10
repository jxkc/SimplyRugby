<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
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
        // Check if the user is authenticated
        if (!auth()->check()) {
            // If not authenticated, redirect to login page
            return redirect()->route('login');
        }

        // Check if the authenticated user has admin role or permission
        if (!auth()->user()->is_admin) {
            // If not admin, abort the request with 403 Forbidden error
            abort(403, 'Unauthorized');
        }

        // If the user is authenticated and is an admin, proceed with the request
        return $next($request);
    }
}
