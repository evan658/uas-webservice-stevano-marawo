<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaguController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// halaman awal
Route::get('/', function () {
    return redirect()->route('login');
});

// dashboard → LANGSUNG KE LAGU
Route::get('/dashboard', function () {
    return redirect()->route('lagu.index');
})->middleware(['auth'])->name('dashboard');

// ROUTE LAGU (WAJIB AUTH)
Route::middleware(['auth'])->group(function () {
    Route::get('/lagu', [LaguController::class, 'index'])->name('lagu.index');
    Route::get('/lagu/create', [LaguController::class, 'create'])->name('lagu.create');
    Route::post('/lagu', [LaguController::class, 'store'])->name('lagu.store');
    Route::get('/lagu/{lagu}/edit', [LaguController::class, 'edit'])->name('lagu.edit');
    Route::put('/lagu/{lagu}', [LaguController::class, 'update'])->name('lagu.update');
    Route::delete('/lagu/{lagu}', [LaguController::class, 'destroy'])->name('lagu.destroy');
});

require __DIR__.'/auth.php';
