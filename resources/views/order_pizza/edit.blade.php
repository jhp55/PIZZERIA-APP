<x-app-layout>
    @section('title', 'Editar Pizza en Pedido')

    <div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Editar Pizza en Pedido</h1>

        <form method="POST" action="{{ route('order_pizza.update', $order_pizza->id) }}">
            @method('PUT')
            @csrf

            {{-- Campo de selección de pedido --}}
            <div class="mb-4">
                <label for="order_id" class="block text-sm font-medium text-gray-700">Seleccionar Pedido</label>
                <select id="order_id" name="order_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Seleccione un pedido...</option>
                    @foreach($orders as $order)
                        <option value="{{ $order->id }}" {{ $order->id == $order_pizza->order_id ? 'selected' : '' }}>
                            Pedido #{{ $order->id }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Campo de selección de tamaño --}}
            <div class="mb-4">
                <label for="pizza_size_id" class="block text-sm font-medium text-gray-700">Tamaño de Pizza</label>
                <select id="pizza_size_id" name="pizza_size_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Seleccione un tamaño...</option>
                    @foreach($pizza_sizes as $size)
                        <option value="{{ $size->id }}" {{ $size->id == $order_pizza->pizza_size_id ? 'selected' : '' }}>
                            {{ ucfirst($size->size) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Campo de cantidad --}}
            <div class="mb-6">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad</label>
                <input type="number" id="quantity" name="quantity" min="1" value="{{ $order_pizza->quantity }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                       placeholder="Ej. 2" required>
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('order_pizza.index') }}" 
                   class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md text-gray-800">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-md text-white">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>