<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role): Response{
        // Verificar si el usuario está autenticado y si tiene el rol correcto
        if (!Auth::check() || Auth::user()->role->name !== $role) {
            abort(403, 'No tienes acceso a esta sección');
        }
        return $next($request);
    }
}
