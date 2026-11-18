<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriaController;

// Home redirect to libros index (optional)
Route::get('/', [LibroController::class, 'index'])->name('home');

// Libros routes
Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');

// Categorías routes
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
