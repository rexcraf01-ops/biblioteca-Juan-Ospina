<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriaController;

// Home redirect to libros index (optional)
Route::get('/', [LibroController::class, 'index'])->name('home');

// Libros routes (CRUD)
Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::get('/libros/create', [LibroController::class, 'create'])->name('libros.create');
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
Route::get('/libros/{libro}/edit', [LibroController::class, 'edit'])->name('libros.edit');
Route::put('/libros/{libro}', [LibroController::class, 'update'])->name('libros.update');
Route::delete('/libros/{libro}', [LibroController::class, 'destroy'])->name('libros.destroy');

// Categorías routes (CRUD limited)
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

