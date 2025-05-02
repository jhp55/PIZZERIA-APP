<x-app-layout>
    @section('title', 'Pedidos de Pizza - JVJ Pizzería')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Listado de Pedidos de Pizza</h1>

        <a href="{{ route('order_pizza.create') }}"
           class="mb-4 inline-block bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded transition">
            Agregar Pedido de Pizza
        </a>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-yellow-500">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">ID Pedido</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Tamaño Pizza</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Cantidad</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($order_pizza as $order_pizzas)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $order_pizza->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $order_pizza->order_id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $order_pizza->pizza_size_id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $order_pizza->quantity }}</td>
                            {{-- Acciones 
                            <td class="px-6 py-4 text-sm font-medium">
                                <a href="{{ route('order_pizza.edit', $orde_pizza->id) }}"
                                   class="text-blue-600 hover:text-blue-800 mr-3">Editar</a>

                                <form action="{{ route('order_pizza.destroy', $orderPizza->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Eliminar</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
