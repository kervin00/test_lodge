<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvailabilityController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AvailabilityController::class, 'index'])->name('dashboard');
     Route::post('/availability', [AvailabilityController::class, 'store'])->name('availability.store');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
