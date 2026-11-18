<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Redirect\RedirectResponse;

class LibroController extends Controller
{
    /**
     * Display a listing of the books with optional filters.
     */
    public function index(Request $request): View
    {
        $query = Libro::with('categoria');

        // Apply filters using scopes
        $query->when($request->filled('categoria'), function ($q) use ($request) {
            $q->categoria($request->input('categoria'));
        });
        $query->when($request->filled('titulo'), function ($q) use ($request) {
            $q->titulo($request->input('titulo'));
        });

        $libros = $query->orderBy('titulo')->paginate(10)->withQueryString();
        $categorias = Categoria::orderBy('nombre')->get();

        return view('libros.index', compact('libros', 'categorias'));
    }

    /**
     * Show the form for creating a new book.
     */
    public function create(): View
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('libros.create', compact('categorias'));
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'titulo'       => 'required|min:3',
            'autor'        => 'required',
            'anio'         => 'required|integer|between:1500,2026',
            'categoria_id' => 'required|exists:categorias,id',
            'disponible'   => 'sometimes|boolean',
        ]);

        $validated['disponible'] = $request->has('disponible') ? (bool) $request->input('disponible') : true;

        Libro::create($validated);

        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    /**
     * Show the form for editing the specified book.
     */
    public function edit(Libro $libro): View
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('libros.edit', compact('libro', 'categorias'));
    }

    /**
     * Update the specified book in storage.
     */
    public function update(Request $request, Libro $libro): RedirectResponse
    {
        $validated = $request->validate([
            'titulo'       => 'required|min:3',
            'autor'        => 'required',
            'anio'         => 'required|integer|between:1500,2026',
            'categoria_id' => 'required|exists:categorias,id',
            'disponible'   => 'sometimes|boolean',
        ]);

        $validated['disponible'] = $request->has('disponible') ? (bool) $request->input('disponible') : false;

        $libro->update($validated);

        return redirect()->route('libros.index')->with('success', 'Libro actualizado correctamente.');
    }

    /**
     * Remove the specified book from storage.
     */
    public function destroy(Libro $libro): RedirectResponse
    {
        $libro->delete();
        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}
