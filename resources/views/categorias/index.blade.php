@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Listado de Categorías</h2>
    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Nombre</th>
                <th class="px-4 py-2 text-left">Creado</th>
                <th class="px-4 py-2 text-left">Actualizado</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categorias as $categoria)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $categoria->id }}</td>
                    <td class="px-4 py-2">{{ $categoria->nombre }}</td>
                    <td class="px-4 py-2">{{ $categoria->created_at->format('d/m/Y') }}</td>
                    <td class="px-4 py-2">{{ $categoria->updated_at->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-2 text-center">No hay categorías registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
