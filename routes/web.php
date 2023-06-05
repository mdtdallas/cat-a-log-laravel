<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\CatBreedController;
use App\Http\Controllers\CatColourController;
use App\Http\Controllers\CatCouncilController;
use App\Http\Controllers\CatGenderController;
use App\Http\Controllers\CatRankController;
use App\Http\Controllers\CatTypeController;
use App\Http\Controllers\ShowJudgesController;
use App\Http\Controllers\ShowSponsorController;
use App\Http\Controllers\ShowResultsController;
use App\Http\Controllers\CatShowController;


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
->only(['index','show', 'create', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::resource('ranks', CatRankController::class)
->only(['index','show', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::resource('types', CatTypeController::class)
->only(['index','show', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::resource('genders', CatGenderController::class)
->only(['index','show', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::resource('breeds', CatBreedController::class)
->only(['index','show', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::resource('colours', CatColourController::class)
->only(['index','show', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::resource('judges', ShowJudgesController::class)
->only(['index','show', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::resource('councils', CatCouncilController::class)
->only(['index','show', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::resource('sponsors', ShowSponsorController::class)
->only(['index','show', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::resource('results', ShowResultsController::class)
->only(['index','show', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::resource('shows', CatShowController::class)
->only(['index','show', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'verified']);
