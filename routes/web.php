<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [MaterialController::class, 'index'])->name('dashboard');
Route::post('/dashboard', [MaterialController::class, 'store'])->name('dashboard.store');
Route::delete('/dashboard/{id}', [MaterialController::class, 'destroy']);


Route::get('/add', function () {
    return view('add');
})->middleware(['auth', 'verified'])->name('add');

Route::get('/edit/{id}', [MaterialController::class, 'edit'])->name('edit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
