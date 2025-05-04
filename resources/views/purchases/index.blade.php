<x-app-layout>
    @section('title', 'Compras - JVJ Pizzería')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Historial de Compras</h1>
    
       <a href="{{ route('purchases.create') }}"
           class="mb-4 inline-block bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded transition">
            Registrar Nueva Compra
        </a>
    
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-yellow-500">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Proveedor</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Materia Prima</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Cantidad</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Precio</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($purchases as $purchase)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $purchase->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $purchase->supplier->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $purchase->rawMaterial->name }} ({{ $purchase->rawMaterial->unit }})
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ number_format($purchase->quantity, 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                ${{ number_format($purchase->purchase_price, 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('purchases.edit', ['purchase' => $purchase->id]) }}"
                                   class="text-blue-600 hover:text-blue-800 mr-3">Editar</a>
    
                                <form action="{{ route('purchases.destroy', ['purchase' => $purchase->id]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Eliminar</button> 
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $purchases->links() }}
        </div>
    </div>
</x-app-layout>