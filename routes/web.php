<?php

use App\Http\Controllers\FacilityInformationController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\HospitalRedirectController;
use App\Http\Controllers\ProfileController;
use App\Models\FacilityInformation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

ROute::get('/hospitals', [HospitalController::class, 'search'])->name('hospital');

Route::post('/facility-information', [FacilityInformationController::class, 'store'])->name('facility.store');


Route::get('/hospital/{id}', [HospitalController::class, 'show'])->name('details');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
