<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PublicController::class, 'index'])->name('login');

// Route für die individuelle Firmenseite
Route::get('/company/{slug}', [PublicController::class, 'show'])
    ->middleware('company.access')
    ->name('company.show');
