<x-app-layout>
    @section('title', 'pizza size - JVJ Pizzería')

    
        <div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Editar Tamaño de Pizza</h1>
    
            <form method="POST" action="{{ route('pizza_sizes.update', ['pizza_size' => $pizza_size->id]) }}">
                @method('PUT')
                @csrf
    
                {{-- ID del tamaño de pizza (solo lectura) --}}
                <div class="mb-4">
                    <label for="id" class="block text-sm font-medium text-gray-700">Código</label>
                    <input type="text" id="id" name="id" value="{{ $pizza_size->id }}" disabled
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 text-gray-600">
                    <p class="text-xs text-gray-500 mt-1">ID del tamaño de pizza (no editable).</p>
                </div>
    
                {{-- Pizza asociada --}}
                <div class="mb-4">
                    <label for="pizza_id" class="block text-sm font-medium text-gray-700">Seleccionar Pizza</label>
                    <select id="pizza_id" name="pizza_id" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option disabled value="">Seleccione una pizza...</option>
                        @foreach ($pizzas as $pizza)
                            <option value="{{ $pizza->id }}" {{ $pizza->id == $pizza_size->pizza_id ? 'selected' : '' }}>
                                {{ $pizza->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
    
                {{-- Tamaño --}}
                <div class="mb-4">
                    <label for="size" class="block text-sm font-medium text-gray-700">Tamaño</label>
                    <select id="size" name="size" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option disabled value="">Seleccione un tamaño...</option>
                        @foreach (['pequeña', 'mediana', 'grande'] as $size)
                            <option value="{{ $size }}" {{ $pizza_size->size === $size ? 'selected' : '' }}>
                                {{ ucfirst($size) }}
                            </option>
                        @endforeach
                    </select>
                </div>
    
                {{-- Precio --}}
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                    <input type="number" step="0.01" id="price" name="price"
                           value="{{ $pizza_size->price }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Precio del tamaño de pizza">
                </div>
    
                {{-- Botones --}}
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('pizza_sizes.index') }}"
                       class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>

</x-app-layout>