<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ContactoController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta para Contactos
Route::resource('contactos', ContactoController::class);
// Ruta para vehiculos
Route::resource('vehiculos', VehiculoController::class);
