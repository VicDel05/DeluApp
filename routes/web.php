<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AcountController;
use App\Http\Controllers\UsersController;

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

Route::middleware([App\Http\Middleware\IsAdmin::class])->group(function () {
    Route::get('/admin/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/admin/users/create', [UsersController::class, 'store'])->name('users.store');
    Route::get('/admin/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/delete/{id}', [UsersController::class, 'destroy'])->name('users.delete');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']) -> name('register.submit');
Route::get('/acount', [AcountController::class, 'showView'])->name('acount');