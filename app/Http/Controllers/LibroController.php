<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LibroController extends Controller
{
    /**
     * Display a listing of the books.
     */
    public function index(): View
    {
        $libros = Libro::with('categoria')
            ->orderBy('titulo')
            ->paginate(10);

        return view('libros.index', compact('libros'));
    }
}
