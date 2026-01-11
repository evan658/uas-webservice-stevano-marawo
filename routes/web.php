<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaguController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('lagu.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('lagu', LaguController::class);
});

require __DIR__.'/auth.php';
