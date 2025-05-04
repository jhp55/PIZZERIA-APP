<x-app-layout>
    @section('title', 'Editar Proveedor - JVJ Pizzería')

    <div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Editar Proveedor</h1>
    
        <form method="POST" action="{{ route('suppliers.update', ['supplier' => $supplier->id]) }}">
            @method('PUT')
            @csrf
    
            {{-- ID del proveedor (solo lectura) --}}
            <div class="mb-4">
                <label for="id" class="block text-sm font-medium text-gray-700">Código</label>
                <input type="text" id="id" name="id" value="{{ $supplier->id }}" disabled
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 text-gray-600">
                <p class="text-xs text-gray-500 mt-1">ID del proveedor (no editable).</p>
            </div>
    
            {{-- Nombre del proveedor --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Proveedor</label>
                <input type="text" id="name" name="name" value="{{ $supplier->name }}" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Nombre completo del proveedor">
            </div>
    
            {{-- Información de contacto --}}
            <div class="mb-6">
                <label for="contact_info" class="block text-sm font-medium text-gray-700">Información de Contacto</label>
                <textarea id="contact_info" name="contact_info" rows="3"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Teléfono, email, persona de contacto, etc.">{{ $supplier->contact_info }}</textarea>
            </div>
    
            {{-- Botones --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('suppliers.index') }}"
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