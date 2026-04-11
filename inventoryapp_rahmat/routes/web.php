<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FormController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'storeRegister']);

Route::get('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| AFTER LOGIN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'home']);
    Route::get('/home', [DashboardController::class, 'home']);

    // Profile
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/profile/update', [AuthController::class, 'updateProfile']);

    // Transaction
    Route::resource('transaction', TransactionController::class);

    // PRODUCT (SEMUA USER BISA LIHAT)
    Route::resource('product', ProductController::class);

    // ADMIN ONLY
    Route::middleware('admin')->group(function () {
        Route::resource('category', CategoryController::class);
    });

});

       

/*
|--------------------------------------------------------------------------
| FORM
|--------------------------------------------------------------------------
*/

Route::get('/form/register', [FormController::class, 'register']);
Route::post('/form/welcome', [FormController::class, 'welcome']);