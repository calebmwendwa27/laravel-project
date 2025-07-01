<?php

use App\Http\Controllers\HospitalController;
use App\Http\Controllers\HospitalRedirectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

ROute::get('/hospital', [HospitalController::class, 'search'])->name('hospital');

Route::get('hospital/redirect/{id}', [HospitalRedirectController::class, 'redirect'])->name('hospitalRedirect');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
