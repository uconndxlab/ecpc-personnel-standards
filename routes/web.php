<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\DisciplineController;


Route::resource('standards', StandardController::class);
Route::resource('disciplines', DisciplineController::class);

Route::get('/', [StandardController::class, 'index'])->name('index');