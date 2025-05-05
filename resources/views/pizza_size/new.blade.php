<x-app-layout>
    @section('title', 'Employees - JVJ Pizzería')

    <div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Agregar Tamaño de Pizza</h1>
    
        <form method="POST" action="{{ route('pizza_sizes.store') }}">
            @csrf
    
            {{-- Select de Pizza --}}
            <div class="mb-4">
                <label for="pizza_id" class="block text-sm font-medium text-gray-700">Seleccionar Pizza</label>
                <select id="pizza_id" name="pizza_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option selected disabled value="">Seleccione una pizza...</option>
                    @foreach ($pizzas as $pizza)
                        <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
                    @endforeach
                </select>
            </div>
    
            {{-- Tamaño --}}
            <div class="mb-4">
                <label for="size" class="block text-sm font-medium text-gray-700">Tamaño</label>
                <select id="size" name="size" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option selected disabled value="">Seleccione un tamaño...</option>
                    <option value="pequeña">pequeña</option>
                    <option value="mediana">Mediana</option>
                    <option value="grande">Grande</option>
                </select>
            </div>
    
            {{-- Precio --}}
            <div class="mb-6">
                <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="number" id="price" name="price" required step="0.01"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                       placeholder="Precio del tamaño seleccionado">
            </div>
    
            {{-- Botones --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('pizza_sizes.index') }}"
                   class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Guardar
                </button>
            </div>
        </form>
    </div>
    

</x-app-layout>