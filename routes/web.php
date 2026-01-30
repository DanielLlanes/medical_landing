<?php

use App\Http\Controllers\FaqController;
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


    Route::get('planes', [PriceController::class, 'index'])->name('plans');
    Route::get('preguntas-frecuentes', [FaqController::class, 'index'])->name('faqs');

    Route::get('contacto', function () {
        return view('contact.index');
    })->name('contact');

    // Procesar registro de tenant
    Route::post('register', [RegisterController::class, 'store'])->name('register');
});
