<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [function () {
    return view('index');
}])->name('index');

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function () {
    Route::get('/categories/create', [AdminController::class, 'create'])->name('categories.create');
    Route::post('/categories', [AdminController::class, 'store'])->name('categories.store');
    Route::get('/categories', [AdminController::class, 'index'])->name('categories.index');
    Route::delete('/categories/{id}', [AdminController::class, 'destroy'])->name('categories.delete');
});


require __DIR__ . '/auth.php';
