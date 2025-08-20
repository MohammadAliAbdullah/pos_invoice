<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TrashController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('products', ProductController::class);
Route::resource('customers', CustomerController::class);
Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
Route::get('/sales/{sale}', [SaleController::class, 'show'])->name('sales.show');
Route::delete('/sales/{sale}', [SaleController::class, 'destroy'])->name('sales.destroy');
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
Route::get('/trash', [TrashController::class, 'index'])->name('trash.index');
Route::get('/trash/{id}/restore', [TrashController::class, 'restore'])->name('trash.restore');

require __DIR__.'/auth.php';
