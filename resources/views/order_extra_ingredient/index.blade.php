<x-app-layout>
    @section('title', 'Ingredientes extra en pedidos - JVJ Pizzería')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Listado de Ingredientes Extra en Pedidos</h1>
    
        <a href="{{ route('order_extra_ingredient.create') }}"
           class="mb-4 inline-block bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded transition">
            Agregar Relación
        </a>
        
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
    
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-yellow-500">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Pedido</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Ingrediente Extra</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Cantidad</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($orderExtraIngredients as $oei)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $oei->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                Pedido Pizza #{{ $oei->pizza_order_id ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $oei->ingredient_name ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $oei->quantity }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('order_extra_ingredient.edit', $oei->id) }}"
                                   class="text-blue-600 hover:text-blue-800 mr-3">Editar</a>
    
                                <form action="{{ route('order_extra_ingredient.destroy', $oei->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" 
                                            onclick="return confirm('¿Estás seguro de eliminar este ingrediente extra?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                No hay ingredientes extra registrados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>