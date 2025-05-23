<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreparationController;
use App\Http\Controllers\StartupController;

Route::get('/', function () {
    return view('home');
});

Route::resource('preparation', PreparationController::class);
Route::get('/startup/{preparation}', [StartupController::class, 'show'])->name('startup.show');
Route::get('/startup/{preparation}/create', [StartupController::class, 'create'])->name('startup.create');
Route::post('/startup/{preparation}', [StartupController::class, 'store'])->name('startup.store');
Route::get('/startup/{preparation}/edit', [StartupController::class, 'edit'])->name('startup.edit');
Route::put('/startup/{preparation}', [StartupController::class, 'update'])->name('startup.update');
