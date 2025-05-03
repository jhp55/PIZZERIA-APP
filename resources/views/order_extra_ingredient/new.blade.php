<x-app-layout>
    @section('title', 'Agregar Ingrediente Extra - JVJ Pizzería')

    <div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Agregar Ingrediente Extra al Pedido</h1>

        <form method="POST" action="{{ route('order_extra_ingredient.store') }}">
            @csrf

            {{-- Seleccionar Pedido --}}
            <div class="mb-4">
                <label for="order_id" class="block text-sm font-medium text-gray-700">Seleccionar Pedido</label>
                <select id="order_id" name="order_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option selected disabled value="">Seleccione un pedido...</option>
                    @foreach ($orders as $order)
                        <option value="{{ $order->id }}">#{{ $order->id }} - {{ $order->customer_name ?? 'Cliente' }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Seleccionar Ingrediente Extra --}}
            <div class="mb-4">
                <label for="extra_ingredient_id" class="block text-sm font-medium text-gray-700">Ingrediente Extra</label>
                <select id="extra_ingredient_id" name="extra_ingredient_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option selected disabled value="">Seleccione un ingrediente...</option>
                    @foreach ($extra_ingredients as $ingredient)
                        <option value="{{ $ingredient->id }}">{{ $ingredient->name }} (${{ number_format($ingredient->price, 2) }})</option>
                    @endforeach
                </select>
            </div>

            {{-- Cantidad --}}
            <div class="mb-6">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad</label>
                <input type="number" id="quantity" name="quantity" required min="1"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                       placeholder="Ej. 1">
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('order_extra_ingredient.index') }}"
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
</x-app-layout>
