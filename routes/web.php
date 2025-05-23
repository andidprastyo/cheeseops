<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreparationController;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\ShutdownController;

Route::get('/', function () {
    return view('home');
});

// Preparation routes
Route::resource('preparation', PreparationController::class);

// Process routes
Route::prefix('process')->name('process.')->group(function () {
    // Startup routes
    Route::controller(StartupController::class)->group(function () {
        Route::get('/startup/{preparation}', 'show')->name('startup.show');
        Route::get('/startup/{preparation}/create', 'create')->name('startup.create');
        Route::post('/startup/{preparation}', 'store')->name('startup.store');
        Route::get('/startup/{preparation}/edit', 'edit')->name('startup.edit');
        Route::put('/startup/{preparation}', 'update')->name('startup.update');
    });

    // Shutdown routes
    Route::controller(ShutdownController::class)->group(function () {
        Route::get('/shutdown/{preparation}', 'show')->name('shutdown.show');
        Route::get('/shutdown/{preparation}/create', 'create')->name('shutdown.create');
        Route::post('/shutdown/{preparation}', 'store')->name('shutdown.store');
        Route::get('/shutdown/{preparation}/edit', 'edit')->name('shutdown.edit');
        Route::put('/shutdown/{preparation}', 'update')->name('shutdown.update');
    });
});
