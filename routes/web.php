<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');

Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');

Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');

Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');