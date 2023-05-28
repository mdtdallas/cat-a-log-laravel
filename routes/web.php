<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\CatBreedController;
use App\Http\Controllers\CatColourController;
use App\Http\Controllers\CatCouncilController;
use App\Http\Controllers\CatGenderController;
use App\Http\Controllers\CatRankController;
use App\Http\Controllers\CatTypeController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('cats', CatController::class)
->only(['index', 'show'])
->middleware(['auth', 'verified']);

// Route::get('/cats/{id}', [CatController::class, 'show'])->name('cats.show');
// Route::get('/cats', [CatController::class, 'index'])->name('cats.index');
// Route::get('/cats/{id}/edit', [CatController::class, 'edit'])->name('cats.show');
// Route::delete('/cats/{id}', [CatController::class, 'destroy'])->name('cats.show');
// Define more routes for CatController if needed

Route::get('/breeds', [CatBreedController::class, 'index']);
Route::get('/breeds/{id}', [CatBreedController::class, 'show']);
// Define more routes for BreedController if needed

Route::get('/colours', [CatColourController::class, 'index']);
Route::get('/colours/{id}', [CatColourController::class, 'show']);
// Define more routes for ColourController if needed

Route::get('/councils', [CatCouncilController::class, 'index']);
Route::get('/councils/{id}', [CatCouncilController::class, 'show']);
// Define more routes for CouncilController if needed

Route::get('/gender', [CatGenderController::class, 'index']);
Route::get('/gender/{id}', [CatGenderController::class, 'show']);
// Define more routes for GenderController if needed

Route::get('/rank', [CatRankController::class, 'index']);
Route::get('/rank/{id}', [CatRankController::class, 'show']);
// Define more routes for RankController if needed

Route::get('/type', [CatTypeController::class, 'index']);
Route::get('/type/{id}', [CatTypeController::class, 'show']);
// Define more routes for TypeController if needed
