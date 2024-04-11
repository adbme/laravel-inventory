<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\MetierController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [MaterialController::class, 'index'])->name('dashboard');
Route::post('/dashboard', [MaterialController::class, 'store'])->name('dashboard.store');
Route::delete('/dashboard/{id}', [MaterialController::class, 'destroy']);


Route::get('/add', [MaterialController::class, 'store'])->name('add');

Route::get('/metier', [MetierController::class, 'index'])->name('metier');

Route::get('/type', [TypeController::class, 'index'])->name('type');


Route::get('/edit/{id}', [MaterialController::class, 'edit'])->name('edit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
