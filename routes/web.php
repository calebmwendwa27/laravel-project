<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard', ['results' => collect()]);
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [MedicineController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ New route to your searchbar view
Route::get('/search-drug', function () {
    return view('searchbar'); // must match resources/views/searchbar.blade.php
})->name('search');
// In routes/web.php
Route::get('/medicines', [MedicineController::class, 'index'])->name('medicine.index');

require __DIR__.'/auth.php';