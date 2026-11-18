<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index(): View
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create(): View
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|unique:categorias,nombre',
        ]);

        Categoria::create($validated);

        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente.');
    }

    /**
     * Remove the specified category from storage.
     * Only allowed if the category has no associated books.
     */
    public function destroy(Categoria $categoria): RedirectResponse
    {
        if ($categoria->libros()->exists()) {
            return redirect()->route('categorias.index')
                ->with('error', 'No se puede eliminar la categoría porque tiene libros asociados.');
        }

        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
