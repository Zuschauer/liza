<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PublicController::class, 'index'])->name('home');
Route::post('/access', [PublicController::class, 'access'])->name('access.submit');
Route::get('/p/{slug}', [PublicController::class, 'show'])->name('company.page');
