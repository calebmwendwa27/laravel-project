<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiseaseController;

Route::middleware('api')->group(function () {
    Route::get('/search', [DiseaseController::class, 'hybridSearch']);
});
