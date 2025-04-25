<x-app-layout>
    @section('title', 'Edit Client - JVJ Pizzería')

    <div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Editar Cliente</h1>

    <form method="POST" action="{{ route('clients.update', ['client' => $client->id]) }}">
        @method('PUT')
        @csrf

        {{-- Código (ID) del cliente --}}
        <div class="mb-4">
            <label for="id" class="block text-sm font-medium text-gray-700">Código</label>
            <input type="text" id="id" name="id" value="{{ $client->id }}" disabled
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 text-gray-600">
            <p class="text-xs text-gray-500 mt-1">ID del cliente (no editable).</p>
        </div>

        {{-- Select Usuario --}}
        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700">Seleccionar Usuario</label>
            <select id="user_id" name="user_id" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option disabled value="">Seleccione un usuario...</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $client->user_id ? 'selected' : '' }}>
                        {{ $user->id }} - {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Dirección --}}
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Dirección</label>
            <input type="text" id="address" name="address" value="{{ $client->address }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Dirección del cliente">
        </div>

        {{-- Teléfono --}}
        <div class="mb-6">
            <label for="phone" class="block text-sm font-semibold text-gray-700">Teléfono</label>
            <input type="tel" id="phone" name="phone" value="{{ $client->phone }}"
                class="mt-1 block w-full rounded-md border-gray-300 px-4 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                placeholder="Número de teléfono">
        </div>

        {{-- Botones --}}
        <div class="flex justify-end space-x-4">
            <a href="{{ route('clients.index') }}"
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