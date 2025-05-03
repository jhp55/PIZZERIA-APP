<x-app-layout>
    @section('title', 'Editar Pedido de Pizza - JVJ Pizzería')

    <div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Editar Pedido de Pizza</h1>

        <form method="POST" action="{{ route('order_pizza.update', $order_pizza->id) }}">
            @method('PUT')
            @csrf

            {{-- ID del pedido --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Código</label>
                <input type="text" value="{{ $order_pizza->id }}" disabled
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 text-gray-600">
                <p class="text-xs text-gray-500 mt-1">ID del pedido de pizza (no editable).</p>
            </div>

            {{-- Pedido asociado --}}
            <div class="mb-4">
                <label for="order_id" class="block text-sm font-medium text-gray-700">Pedido</label>
                <select id="order_id" name="order_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option disabled value="">Seleccione un pedido...</option>
                    @foreach($orders ?? [] as $order)
                        <option value="{{ $order->id }}" {{ $order->id == $order_pizza->order_id ? 'selected' : '' }}>
                            Pedido #{{ $order->id }} - {{ $order->customer_name ?? 'Sin nombre' }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tamaño de pizza --}}
            <div class="mb-4">
                <label for="pizza_size_id" class="block text-sm font-medium text-gray-700">Tamaño de Pizza</label>
                <select id="pizza_size_id" name="pizza_size_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option disabled value="">Seleccione un tamaño...</option>
                    @foreach($pizza_sizes ?? [] as $size)
                        <option value="{{ $size->id }}" {{ $size->id == $order_pizza->pizza_size_id ? 'selected' : '' }}>
                            {{ $size->pizza->name ?? 'Pizza' }} - {{ ucfirst($size->size) }} ({{ $size->price ?? 0 }}€)
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Cantidad --}}
            <div class="mb-4">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad</label>
                <input type="number" id="quantity" name="quantity" min="1" 
                       value="{{ $order_pizza->quantity ?? 1 }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       required>
            </div>

            {{-- Ingredientes extra --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Ingredientes Extra</label>
                <div class="space-y-2">
                    @forelse($extra_ingredients ?? [] as $ingredient)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="checkbox" id="ingredient_{{ $ingredient->id }}" 
                                       name="extra_ingredients[{{ $ingredient->id }}][id]" 
                                       value="{{ $ingredient->id }}"
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                       {{ $order_pizza->extraIngredients->contains($ingredient->id) ? 'checked' : '' }}>
                                <label for="ingredient_{{ $ingredient->id }}" class="ml-2 text-sm text-gray-700">
                                    {{ $ingredient->name }} ({{ $ingredient->price ?? 0 }}€)
                                </label>
                            </div>
                            <input type="number" name="extra_ingredients[{{ $ingredient->id }}][quantity]" 
                                   min="1" value="{{ $order_pizza->extraIngredients->find($ingredient->id)->pivot->quantity ?? 1 }}"
                                   class="w-16 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No hay ingredientes extra disponibles</p>
                    @endforelse
                </div>
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('order_pizza.index') }}" 
                   class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md text-gray-800">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-md text-white">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>