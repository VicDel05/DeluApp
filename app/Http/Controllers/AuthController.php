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

        // Intentar autenticar al usuario
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Si es exitoso, redirigir al dashboard
            return redirect()->route('dashboard')->with('success', 'Inicio de sesión exitoso');
        }

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
