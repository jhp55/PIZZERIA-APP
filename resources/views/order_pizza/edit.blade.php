<x-app-layout>
    @section('title', 'Pedido de Pizza - JVJ Pizzería')

    <div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Editar Pedido de Pizza</h1>

        <form method="POST" action="{{ route('order_pizza.update', ['order_pizza' => $order_pizza->id]) }}">
            @method('PUT')
            @csrf

            {{-- ID del pedido de pizza (solo lectura) --}}
            <div class="mb-4">
                <label for="id" class="block text-sm font-medium text-gray-700">Código</label>
                <input type="text" id="id" name="id" value="{{ $order_pizza->id }}" disabled
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 text-gray-600">
                <p class="text-xs text-gray-500 mt-1">ID del pedido de pizza (no editable).</p>
            </div>

            {{-- Pedido asociado --}}
            <div class="mb-4">
                <label for="order_id" class="block text-sm font-medium text-gray-700">Pedido</label>
                <select id="order_id" name="order_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option disabled value="">Seleccione un pedido...</option>
                    @foreach ($orders as $order)
                        <option value="{{ $order->id }}" {{ $order->id == $order_pizza->order_id ? 'selected' : '' }}>
                            Pedido #{{ $order->id }} - {{ $order->customer_name }}
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
                    @foreach ($pizza_sizes as $pizza_size)
                        <option value="{{ $pizza_size->id }}" {{ $pizza_size->id == $order_pizza->pizza_size_id ? 'selected' : '' }}>
                            {{ $pizza_size->pizza->name }} - {{ ucfirst($pizza_size->size) }} ({{ $pizza_size->price }}€)
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Cantidad --}}
            <div class="mb-4">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad</label>
                <input type="number" id="quantity" name="quantity"
                       value="{{ $order_pizza->quantity }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Cantidad de pizzas" min="1">
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('order_pizza.index') }}"
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