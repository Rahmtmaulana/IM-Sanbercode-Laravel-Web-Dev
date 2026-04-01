<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

Route::get('/', [DashboardController::class, 'home']);
Route::get('/register', [FormController::class, 'register']);
Route::post('/welcome', [FormController::class, 'welcome']);


