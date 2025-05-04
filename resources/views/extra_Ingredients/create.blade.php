@extends('layouts.app')

@section('title', 'Nuevo Ingrediente Extra - JVJ Pizzería')

@section('content')
<div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Agregar Ingrediente Extra</h1>

    <form method="POST" action="{{ route('extra_ingredients.store') }}">
        @csrf

        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Ingrediente</label>
            <input type="text" id="name" name="name" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Ej: Queso Extra">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="price" class="block text-sm font-medium text-gray-700">Precio Adicional</label>
            <input type="number" id="price" name="price" step="0.01" min="0" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Ej: 1.50">
            @error('price')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('extra_ingredients.index') }}"
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