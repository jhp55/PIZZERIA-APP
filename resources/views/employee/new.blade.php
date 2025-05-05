<x-app-layout>
    @section('title', 'New employees - JVJ Pizzería')

<div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Agregar Empleado</h1>

    <form method="POST" action="{{ route('employees.store') }}">
        @csrf

        {{-- Select de Usuario --}}
        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700">Seleccionar Usuario</label>
            <select id="user_id" name="user_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option selected disabled value="">Seleccione un usuario...</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->id }} {{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        {{-- Posición (Select) --}}
        <div class="mb-4">
            <label for="position" class="block text-sm font-medium text-gray-700">Posición</label>
            <select id="position" name="position" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option selected disabled value="">Seleccione una posición...</option>
                <option value="cajero">Cajero</option>
                <option value="administrador">Administrador</option>
                <option value="cocinero">Cocinero</option>
                <option value="mensajero">Mensajero</option>
            </select>
        </div>


        {{-- Número de identificación --}}
        <div class="mb-4">
            <label for="identification_number" class="block text-sm font-medium text-gray-700">Número de Identificación</label>
            <input type="text" id="identification_number" name="identification_number" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                   placeholder="Cédula o ID del empleado">
        </div>

        {{-- Salario --}}
        <div class="mb-4">
            <label for="salary" class="block text-sm font-medium text-gray-700">Salario</label>
            <input type="number" id="salary" name="salary" required step="0.01"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                   placeholder="Salario del empleado">
        </div>

        {{-- Fecha de Contratación --}}
        <div class="mb-6">
            <label for="hire_date" class="block text-sm font-medium text-gray-700">Fecha de Contratación</label>
            <input type="date" id="hire_date" name="hire_date" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        {{-- Botones --}}
        <div class="flex justify-end space-x-4">
            <a href="{{ route('employees.index') }}"
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