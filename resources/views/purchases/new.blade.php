<x-app-layout>
    @section('title', 'Nueva Compra - JVJ Pizzería')

<div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Registrar Nueva Compra</h1>

    <form method="POST" action="{{ route('purchases.store') }}">
        @csrf

        {{-- Proveedor --}}
        <div class="mb-4">
            <label for="supplier_id" class="block text-sm font-medium text-gray-700">Proveedor</label>
            <select id="supplier_id" name="supplier_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">Seleccione un proveedor</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Materia Prima --}}
        <div class="mb-4">
            <label for="raw_material_id" class="block text-sm font-medium text-gray-700">Materia Prima</label>
            <select id="raw_material_id" name="raw_material_id" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">Seleccione una materia prima</option>
                @foreach($rawMaterials as $material)
                    <option value="{{ $material->id }}" data-unit="{{ $material->unit }}">
                        {{ $material->name }} ({{ $material->unit }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Cantidad --}}
        <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad</label>
            <div class="flex items-center">
                <input type="number" id="quantity" name="quantity" step="0.01" min="0.01" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Ej: 5.25">
                <span id="unit-display" class="ml-2 text-gray-500"></span>
            </div>
        </div>

        {{-- Precio de Compra --}}
        <div class="mb-4">
            <label for="purchase_price" class="block text-sm font-medium text-gray-700">Precio de Compra</label>
            <div class="relative mt-1 rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <span class="text-gray-500">$</span>
                </div>
                <input type="number" id="purchase_price" name="purchase_price" step="0.01" min="0.01" required
                       class="block w-full pl-7 rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Ej: 12.99">
            </div>
        </div>

        {{-- Fecha de Compra --}}
        <div class="mb-6">
            <label for="purchase_date" class="block text-sm font-medium text-gray-700">Fecha de Compra</label>
            <input type="datetime-local" id="purchase_date" name="purchase_date" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        {{-- Botones --}}
        <div class="flex justify-end space-x-4">
            <a href="{{ route('purchases.index') }}"
               class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded">
                Cancelar
            </a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Registrar Compra
            </button>
        </div>
    </form>
</div>

<script>
    // Mostrar unidad de medida cuando seleccionan materia prima
    document.getElementById('raw_material_id').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        document.getElementById('unit-display').textContent = selectedOption.dataset.unit || '';
    });
</script>
</x-app-layout>