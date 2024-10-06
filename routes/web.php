<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AcountController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\EmployeeMenuController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ReportController;

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
    Route::get('/staff/products', [EmployeeMenuController::class, 'showProducts'])->name('products');
});

Route::middleware([App\Http\Middleware\IsAdmin::class])->group(function () {
    // Usuarios
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{id}', [UsersController::class, 'destroy'])->name('users.delete');
    // Categorias
    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/categories/create', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categories/delete/{id}', [CategoriesController::class, 'destroy'])->name('categories.delete');
    // Productos
    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/products/create', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('/products/update/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/products/delete/{id}', [ProductsController::class, 'destroy'])->name('products.delete');
    // Reportes
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/stock', [ReportController::class, 'stockReport'])->name('reports.stock');
    Route::get('/reports/user', [ReportController::class, 'userReport'])->name('reports.user');
    Route::get('/reports/sale', [ReportController::class, 'saleReport'])->name('reports.sale');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']) -> name('register.submit');
Route::get('/acount', [AcountController::class, 'showView'])->name('acount');
//Route::resource('sales', SalesController::class);

Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
Route::get('/sales/create', [SalesController::class, 'create'])->name('sales.create');    
Route::post('/sales/create', [SalesController::class, 'store'])->name('sales.store');
Route::get('/sales/edit/{id}', [SalesController::class, 'edit'])->name('sales.edit');
Route::put('/sales/update/{id}', [SalesController::class, 'update'])->name('sales.update');
Route::delete('/sales/delete/{id}', [SalesController::class, 'destroy'])->name('sales.delete');