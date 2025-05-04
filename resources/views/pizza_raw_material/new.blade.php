<x-app-layout>
    @section('title', 'Agregar Ingrediente a Pizza - JVJ Pizzería')

<div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Agregar Ingrediente a Pizza</h1>

    <form method="POST" action="{{ route('pizza_raw_materials.store') }}">
        @csrf

        {{-- Selección de Pizza --}}
        <div class="mb-4">
            <label for="pizza_id" class="block text-sm font-medium text-gray-700">Pizza</label>
            <select id="pizza_id" name="pizza_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">Seleccione una pizza</option>
                @foreach($pizzas as $pizza)
                    <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Selección de Materia Prima --}}
        <div class="mb-4">
            <label for="raw_material_id" class="block text-sm font-medium text-gray-700">Materia Prima</label>
            <select id="raw_material_id" name="raw_material_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">Seleccione una materia prima</option>
                @foreach($rawMaterials as $material)
                    <option value="{{ $material->id }}">{{ $material->name }} ({{ $material->unit }})</option>
                @endforeach
            </select>
        </div>

        {{-- Cantidad --}}
        <div class="mb-6">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad</label>
            <input type="number" id="quantity" name="quantity" step="0.01" min="0.01" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Ej: 0.50">
        </div>

        {{-- Botones --}}
        <div class="flex justify-end space-x-4">
            <a href="{{ route('pizza_raw_materials.index') }}"
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