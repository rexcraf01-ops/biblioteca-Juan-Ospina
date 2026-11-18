@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Listado de Libros</h2>
    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Título</th>
                <th class="px-4 py-2 text-left">Autor</th>
                <th class="px-4 py-2 text-left">Año</th>
                <th class="px-4 py-2 text-left">Categoría</th>
                <th class="px-4 py-2 text-left">Disponible</th>
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
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-2 text-center">No hay libros registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $libros->links() }}
    </div>
@endsection
