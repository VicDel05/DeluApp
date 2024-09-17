<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AcountController;

// Mostrar formulario de login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Procesar login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Proteger el acceso al dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']) -> name('register.submit');

Route::get('/acount', [AcountController::class, 'showView'])->name('acount');