<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Ruta raíz que redirige a login
Route::get('/', function () {
    return redirect()->route('login');
});

// Ruta para Contactos
Route::resource('contactos', ContactoController::class);
// Ruta para vehiculos
Route::resource('vehiculos', VehiculoController::class);
