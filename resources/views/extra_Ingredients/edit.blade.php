<x-app-layout>

@section('title', 'Editar Ingrediente Extra - JVJ Pizzería')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <!-- Encabezado -->
    <div class="bg-yellow-500 px-6 py-4">
        <h1 class="text-xl font-semibold text-white">Editar Ingrediente Extra</h1>
    </div>

    <!-- Contenido del formulario -->
    <div class="p-6">
        <form method="POST" action="{{ route('extra_ingredients.update', $extraIngredient->id) }}">
            @method('PUT')
            @csrf

            <!-- Campo ID (solo lectura) -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Código</label>
                <div class="px-3 py-2 bg-gray-100 rounded text-gray-700">
                    {{ $extraIngredient->id }}
                </div>
            </div>

            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name', $extraIngredient->name) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                       required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo Precio -->
            <div class="mb-6">
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Precio</label>
                <input type="number" id="price" name="price" step="0.01" min="0" 
                       value="{{ old('price', $extraIngredient->price) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                       required>
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botones de acción -->
            <div class="flex justify-between items-center">
                <a href="{{ route('extra_ingredients.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Cancelar
                </a>
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z" />
                    </svg>
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>