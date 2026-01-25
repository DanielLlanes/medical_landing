<?php

use App\Http\Controllers\PriceController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;



// ===============================
// LANDING + REGISTER TENANT
// ===============================
Route::prefix('/')->name('landing.')->group(function () {

    // Página principal
    Route::get('/', function () {
        return view('index');
    })->name('index');

    // Página de planes
    Route::get('planes', [PriceController::class, 'index'])->name('plans');

    Route::get('contacto', function () {
        return view('contact.index');
    })->name('contact');

    // Procesar registro de tenant
    Route::post('register', [RegisterController::class, 'store'])->name('register');
});
