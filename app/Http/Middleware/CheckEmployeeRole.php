<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckEmployeeRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{
        // Asegúrate de que el usuario esté autenticado
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Verifica si el rol del usuario es 'empleado' o cualquier otro rol específico
        if (Auth::user()->role_id != 2) { // Suponiendo que '2' es el rol de empleado
            return redirect('/staff')->with('error', 'No tienes acceso a esta sección');
        }

        return $next($request);
    }
}
