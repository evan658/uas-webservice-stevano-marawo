<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaguController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

// register
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD & CRUD LAGU
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [LaguController::class, 'index'])
        ->name('dashboard');

    Route::resource('lagu', LaguController::class);
});
