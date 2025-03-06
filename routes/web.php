<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\IsAdmin;



Route::get('standards/import', [StandardController::class, 'showImportForm'])->name('standards.import.form');
Route::post('standards/import', [StandardController::class, 'importStandard'])->name('standards.import');

Route::resource('standards', StandardController::class);
Route::resource('disciplines', DisciplineController::class);

Route::get('/', [StandardController::class, 'index'])->name('index');

Route::get('/state/{abbreviation}', [StateController::class, 'show'])->name('state.show');
Route::get('/states', [StateController::class, 'index'])->name('states.index');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// protect the following routes with the IsAdmin middleware
Route::group(['middleware' => IsAdmin::class], function () {
    Route::get('/standards/{standard}/edit', [StandardController::class, 'edit'])->name('standards.edit');
    Route::put('/standards/{standard}', [StandardController::class, 'update'])->name('standards.update');
    Route::delete('/standards/{standard}', [StandardController::class, 'destroy'])->name('standards.destroy');
    Route::get('/standards/create', [StandardController::class, 'create'])->name('standards.create');
    Route::post('/standards', [StandardController::class, 'store'])->name('standards.store');
});