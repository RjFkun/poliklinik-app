<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Usage: ->middleware('role:admin') or ->middleware('role:admin,dokter')
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::user();

        if (! $user) {
            return response('Unauthorized', 401);
        }

        // support comma separated roles
        $roles = array_map('trim', explode(',', $role));

        if (! in_array($user->role, $roles, true)) {
            return response('Forbidden', 403);
        }

        return $next($request);
    }
}
