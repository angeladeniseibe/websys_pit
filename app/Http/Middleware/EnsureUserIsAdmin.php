<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // If the session role isn't 'admin', block them immediately with a 403 Forbidden page
        if (session('user_role') !== 'admin') {
            abort(403, 'Access Denied: This operation is restricted to Administrators only. Clients have Read-Only access.');
        }

        return $next($request);
    }
}