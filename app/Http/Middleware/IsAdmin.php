<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario ha iniciado sesión y si es administrador
        if (Auth::check() && Auth::user()->role_id == '1') {
            return $next($request);  // Permite el acceso si es administrador
        }

        // Si no es administrador, redirige a otra página
        return redirect('/')->with('error', 'No tienes permisos de administrador.');
    }
}
