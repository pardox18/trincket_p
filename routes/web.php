<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\HomeController;

// Ruta de bienvenida (pantalla principal)
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación (iniciar sesión, registro y logout)
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Rutas de productos (mostrar productos, crear, mostrar detalles)
Route::get('products', [ProductController::class, 'index'])->name('products.index'); // Página de productos
Route::middleware(['auth'])->group(function () {
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create'); // Crear producto
    Route::post('products', [ProductController::class, 'store'])->name('products.store'); // Guardar producto
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show'); // Ver detalles de un producto
});

// Ruta para la compra de producto
Route::post('purchase/{product}', [PurchaseController::class, 'purchase'])->name('purchase');

// Ruta para la página de inicio de usuario autenticado (Home)
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
