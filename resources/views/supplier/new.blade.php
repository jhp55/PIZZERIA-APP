<x-app-layout>
    @section('title', 'Nuevo Proveedor - JVJ Pizzería')

<div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Agregar Proveedor</h1>

    <form method="POST" action="{{ route('suppliers.store') }}">
        @csrf

        {{-- Nombre del Proveedor --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Proveedor</label>
            <input type="text" id="name" name="name" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Nombre completo del proveedor">
        </div>

        {{-- Información de Contacto --}}
        <div class="mb-6">
            <label for="contact_info" class="block text-sm font-medium text-gray-700">Información de Contacto</label>
            <textarea id="contact_info" name="contact_info" rows="3"
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                      placeholder="Teléfono, email, persona de contacto, etc."></textarea>
        </div>

        {{-- Botones --}}
        <div class="flex justify-end space-x-4">
            <a href="{{ route('suppliers.index') }}"
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