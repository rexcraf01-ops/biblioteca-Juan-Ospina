@extends('layouts.app')

@section('content')
    <div class="bg-card rounded-xl shadow-card p-6">
        <h2 class="text-2xl font-semibold mb-4">
            Listado de <span class="text-accent">Libros</span>
        </h2>

        <!-- Filtro / Búsqueda -->
        <form method="GET" action="{{ route('libros.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block text-secondary mb-1">Categoría</label>
                <select name="categoria" class="input-pill">
                    <option value="">Todas</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}" {{ request('categoria') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="md:col-span-2">
                <label class="block text-secondary mb-1">Buscar por título</label>
                <input type="text" name="titulo" value="{{ request('titulo') }}" placeholder="Escriba el título" class="input-pill" />
            </div>
            <div class="md:col-span-3 flex space-x-2">
                <button type="submit" class="btn-primary">Filtrar</button>
                <a href="{{ route('libros.index') }}" class="btn-outline">Limpiar</a>
                <a href="{{ route('libros.create') }}" class="btn-active ml-auto">Nuevo Libro</a>
            </div>
        </form>

        <!-- Tabla de libros -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-dark">
                <thead class="bg-card">
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
                        <tr class="border-b border-[#2A2830]">
                            <td class="px-4 py-2">{{ $libro->titulo }}</td>
                            <td class="px-4 py-2">{{ $libro->autor }}</td>
                            <td class="px-4 py-2">{{ $libro->anio }}</td>
                            <td class="px-4 py-2">{{ $libro->categoria->nombre ?? 'Sin categoría' }}</td>
                            <td class="px-4 py-2">
                                @if($libro->disponible)
                                    <span class="text-positive font-medium">Sí</span>
                                @else
                                    <span class="text-red-600 font-medium">No</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('libros.edit', $libro) }}" class="btn-outline">Editar</a>
                                <form method="POST" action="{{ route('libros.destroy', $libro) }}" onsubmit="return confirm('¿Seguro que desea eliminar este libro?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-outline text-red-600">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 text-center text-secondary">No hay libros registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $libros->links() }}
        </div>
    </div>
@endsection
