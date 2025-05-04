@extends('layouts.app')

@section('title', 'Nuevo Ingrediente - JVJ Pizzería')

@section('content')
<div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Agregar Ingrediente</h1>

    <form method="POST" action="{{ route('ingredients.store') }}">
        @csrf

        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Ingrediente</label>
            <input type="text" id="name" name="name" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Ej: Queso Mozzarella">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('ingredients.index') }}"
               class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded">
                Cancelar
            </a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection