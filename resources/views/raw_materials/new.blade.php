<x-app-layout>
    @section('title', 'Nueva Materia Prima - JVJ Pizzería')

<div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Agregar Materia Prima</h1>

    <form method="POST" action="{{ route('raw_materials.store') }}">
        @csrf

        {{-- Nombre de la Materia Prima --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre de la Materia Prima</label>
            <input type="text" id="name" name="name" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Ej: Harina, Queso Mozzarella, Tomate">
        </div>

        {{-- Unidad de Medida --}}
        <div class="mb-4">
            <label for="unit" class="block text-sm font-medium text-gray-700">Unidad de Medida</label>
            <input type="text" id="unit" name="unit" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Ej: kg, litros, unidades">
        </div>

        {{-- Stock Actual --}}
        <div class="mb-6">
            <label for="current_stock" class="block text-sm font-medium text-gray-700">Stock Actual</label>
            <input type="number" id="current_stock" name="current_stock" step="0.01" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Cantidad en stock">
        </div>

        {{-- Botones --}}
        <div class="flex justify-end space-x-4">
            <a href="{{ route('raw_materials.index') }}"
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