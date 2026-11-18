@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Crear Libro</h2>
    <form method="POST" action="{{ route('libros.store') }}">
        @csrf
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
                <label class="block font-medium">Título</label>
                <input type="text" name="titulo" value="{{ old('titulo') }}" class="w-full border rounded p-2" required>
                @error('titulo')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block font-medium">Autor</label>
                <input type="text" name="autor" value="{{ old('autor') }}" class="w-full border rounded p-2" required>
                @error('autor')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block font-medium">Año</label>
                <input type="number" name="anio" value="{{ old('anio') }}" class="w-full border rounded p-2" required>
                @error('anio')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block font-medium">Categoría</label>
                <select name="categoria_id" class="w-full border rounded p-2" required>
                    <option value="">-- Seleccione --</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}" {{ old('categoria_id') == $cat->id ? 'selected' : '' }}>{{ $cat->nombre }}</option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-2">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="disponible" value="1" {{ old('disponible', true) ? 'checked' : '' }} class="mr-2">
                    Disponible
                </label>
                @error('disponible')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('libros.index') }}" class="ml-4 text-gray-600">Cancelar</a>
        </div>
    </form>
@endsection
