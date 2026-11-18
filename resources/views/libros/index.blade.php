@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Listado de Libros</h2>

    <!-- Filter / Search Form -->
    <form method="GET" action="{{ route('libros.index') }}" class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block font-medium">Categoría</label>
            <select name="categoria" class="w-full border rounded p-2">
                <option value="">Todas</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}" {{ request('categoria') == $cat->id ? 'selected' : '' }}>{{ $cat->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="md:col-span-2">
            <label class="block font-medium">Buscar por título</label>
            <input type="text" name="titulo" value="{{ request('titulo') }}" placeholder="Escriba el título" class="w-full border rounded p-2" />
        </div>
        <div class="md:col-span-3 flex space-x-2">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Filtrar</button>
            <a href="{{ route('libros.index') }}" class="bg-gray-300 text-black px-4 py-2 rounded">Limpiar</a>
            <a href="{{ route('libros.create') }}" class="bg-green-600 text-white px-4 py-2 rounded ml-auto">Nuevo Libro</a>
        </div>
    </form>

    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Título</th>
                <th class="px-4 py-2 text-left">Autor</th>
                <th class="px-4 py-2 text-left">Año</th>
                <th class="px-4 py-2 text-left">Categoría</th>
                <th class="px-4 py-2 text-left">Disponible</th>
                <th class="px-4 py-2 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($libros as $libro)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $libro->titulo }}</td>
                    <td class="px-4 py-2">{{ $libro->autor }}</td>
                    <td class="px-4 py-2">{{ $libro->anio }}</td>
                    <td class="px-4 py-2">{{ $libro->categoria->nombre ?? 'Sin categoría' }}</td>
                    <td class="px-4 py-2">
                        @if($libro->disponible)
                            <span class="text-green-600 font-medium">Sí</span>
                        @else
                            <span class="text-red-600 font-medium">No</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('libros.edit', $libro) }}" class="text-blue-600">Editar</a>
                        <form method="POST" action="{{ route('libros.destroy', $libro) }}" class="inline" onsubmit="return confirm('¿Seguro que desea eliminar este libro?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-2 text-center">No hay libros registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $libros->links() }}
    </div>
@endsection
