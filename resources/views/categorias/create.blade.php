@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Crear Categoría</h2>
    <form method="POST" action="{{ route('categorias.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block font-medium">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full border rounded p-2" required>
            @error('nombre')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Guardar</button>
        <a href="{{ route('categorias.index') }}" class="ml-4 text-gray-600">Cancelar</a>
    </form>
@endsection