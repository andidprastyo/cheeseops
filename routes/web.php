<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreparationController;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\ShutdownController;

Route::get('/', function () {
    return view('home');
});

Route::resource('preparation', PreparationController::class);
Route::get('/startup/{preparation}', [StartupController::class, 'show'])->name('startup.show');
Route::get('/startup/{preparation}/create', [StartupController::class, 'create'])->name('startup.create');
Route::post('/startup/{preparation}', [StartupController::class, 'store'])->name('startup.store');
Route::get('/startup/{preparation}/edit', [StartupController::class, 'edit'])->name('startup.edit');
Route::put('/startup/{preparation}', [StartupController::class, 'update'])->name('startup.update');

Route::get('/shutdown/{preparation}', [ShutdownController::class, 'show'])->name('shutdown.show');
Route::get('/shutdown/{preparation}/create', [ShutdownController::class, 'create'])->name('shutdown.create');
Route::post('/shutdown/{preparation}', [ShutdownController::class, 'store'])->name('shutdown.store');
Route::get('/shutdown/{preparation}/edit', [ShutdownController::class, 'edit'])->name('shutdown.edit');
Route::put('/shutdown/{preparation}', [ShutdownController::class, 'update'])->name('shutdown.update');
