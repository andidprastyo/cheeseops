<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreparationController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('preparation', PreparationController::class);
