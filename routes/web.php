<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AcountController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\EmployeeMenuController;

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

Route::middleware(['auth', \App\Http\Middleware\CheckEmployeeRole::class])->group(function () {
    Route::get('/staff', [EmployeeMenuController::class, 'index'])->name('staff');
});

Route::middleware([App\Http\Middleware\IsAdmin::class])->group(function () {
    // Usuarios
    Route::get('/admin/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/admin/users/create', [UsersController::class, 'store'])->name('users.store');
    Route::get('/admin/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/delete/{id}', [UsersController::class, 'destroy'])->name('users.delete');
    // Categorias
    Route::get('/staff/categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/staff/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/staff/categories/create', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/staff/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('/staff/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/staff/categories/delete/{id}', [CategoriesController::class, 'destroy'])->name('categories.delete');
    // Productos
    Route::get('/admin/products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/admin/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/admin/products/create', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/admin/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('/admin/products/update/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/admin/products/delete/{id}', [ProductsController::class, 'destroy'])->name('products.delete');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']) -> name('register.submit');
Route::get('/acount', [AcountController::class, 'showView'])->name('acount');