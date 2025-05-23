<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreparationController;
use App\Http\Controllers\StartupController;

Route::get('/', function () {
    return view('home');
});

Route::resource('preparation', PreparationController::class);
Route::get('/startup/{preparation}', [StartupController::class, 'show'])->name('startup.show');
