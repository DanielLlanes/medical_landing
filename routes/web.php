<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('landing.index');

Route::get('planes', function () {
    return view('pricing.index');
})->name('landing.plans');
