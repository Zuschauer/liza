<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PublicController::class, 'index'])->name('home');
// Route für die Code-Eingabe
Route::get('/access', [PublicController::class, 'showCodeForm'])->name('access.form');
Route::post('/access', [PublicController::class, 'access'])->name('access.verify');

// Route für die individuelle Firmenseite
Route::get('/company/{slug}', [PublicController::class, 'show'])->name('company.show');
