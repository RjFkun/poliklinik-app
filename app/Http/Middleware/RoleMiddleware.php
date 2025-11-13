<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::user();
    
        // if ($user->role !== $role) {
        //     return redirect()->route('Unauthorized.', 403);
      //  }
        
      if ($user->role !== $role) {
        abort(403, 'Unauthorized');
    }
    
        return $next($request);
    }
}


//middleware untuk mengecek role user apakah sesuai dengan yang diijinkan atau tidak