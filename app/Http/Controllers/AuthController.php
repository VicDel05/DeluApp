<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar formulario de login
    public function showLoginForm(){
        return view('auth.login');
    }

    // Procesar el login
    public function login(Request $request){

        
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Validación de los datos del formulario de login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intento de autenticación
        if (Auth::attempt($credentials)) {
            // Regenerar la sesión después del login para mayor seguridad
            $request->session()->regenerate();

            // Obtener el usuario autenticado
            $user = Auth::user();
            
            // Verificar el rol del usuario
            if ($user->role_id == 1) {
                // Rol de Administrador, redirigir al dashboard de administrador
                return redirect()->route('dashboard');
            } elseif ($user->role_id == 2) {
                // Rol de Empleado, redirigir al menú de empleados
                return redirect()->route('staff');
            }

            // Si el rol no coincide, redirigir a una página predeterminada
            return redirect()->route('home');
        }

        // // Intentar autenticar al usuario
        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     // Si es exitoso, redirigir al dashboard
        //     return redirect()->route('dashboard')->with('success', 'Inicio de sesión exitoso');
        // }

        // Si falla, redirigir de nuevo al login con error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->withInput();
    }

    // Cerrar sesión
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Sesión cerrada con éxito');
    }
}
