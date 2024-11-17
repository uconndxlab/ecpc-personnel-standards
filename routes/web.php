<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\StateController;



Route::resource('standards', StandardController::class);
Route::resource('disciplines', DisciplineController::class);

Route::get('/', [StandardController::class, 'index'])->name('index');

Route::get('/state/{abbreviation}', [StateController::class, 'show'])->name('state.show');
Route::get('/states', [StateController::class, 'index'])->name('states.index');

