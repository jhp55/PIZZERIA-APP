<x-app-layout>
    @section('title', 'Materias Primas - JVJ Pizzería')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Listado de Materias Primas</h1>
    
       <a href="{{ route('raw_materials.create') }}"
           class="mb-4 inline-block bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded transition">
            Agregar Materia Prima
        </a>
    
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-yellow-500">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Código</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Unidad</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Stock Actual</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($raw_materials as $material)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $material->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $material->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $material->unit }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $material->current_stock }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('raw_materials.edit', ['raw_material' => $material->id]) }}"
                                   class="text-blue-600 hover:text-blue-800 mr-3">Editar</a>
    
                                <form action="{{ route('raw_materials.destroy', ['raw_material' => $material->id]) }}" method="POST" class="inline">
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
    </div>
</x-app-layout>