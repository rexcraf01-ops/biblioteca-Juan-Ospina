<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
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
}
