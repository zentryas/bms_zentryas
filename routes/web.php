<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('welcome');

// Route::get('/', function () {
//     return redirect()->route('dashboard');
// });

Route::resource('transaksi', TransaksiController::class);
Route::post('transaksi-update/{id}', [TransaksiController::class, 'transaksi_update'])->name('transaksi.update');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
