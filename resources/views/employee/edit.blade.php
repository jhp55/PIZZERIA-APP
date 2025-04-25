<x-app-layout>
    @section('title', 'Edit employees - JVJ Pizzería')

    <div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Editar Empleado</h1>
    
        <form method="POST" action="{{ route('employees.update', ['employee' => $employee->id]) }}">
            @method('PUT')
            @csrf
    
            {{-- ID del empleado (solo lectura) --}}
            <div class="mb-4">
                <label for="id" class="block text-sm font-medium text-gray-700">Código</label>
                <input type="text" id="id" name="id" value="{{ $employee->id }}" disabled
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 text-gray-600">
                <p class="text-xs text-gray-500 mt-1">ID del empleado (no editable).</p>
            </div>
    
            {{-- Usuario asociado --}}
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Seleccionar Usuario</label>
                <select id="user_id" name="user_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option disabled value="">Seleccione un usuario...</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $employee->user_id ? 'selected' : '' }}>
                            {{ $user->id }} - {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
            </div>
    
            {{-- Cargo (position) --}}
            <div class="mb-4">
                <label for="position" class="block text-sm font-medium text-gray-700">Cargo</label>
                <select id="position" name="position" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option disabled value="">Seleccione un cargo...</option>
                    @foreach (['cajero', 'administrador', 'cocinero', 'mensajero'] as $role)
                        <option value="{{ $role }}" {{ $employee->position === $role ? 'selected' : '' }}>
                            {{ ucfirst($role) }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            {{-- Número de identificación --}}
            <div class="mb-4">
                <label for="identification_number" class="block text-sm font-medium text-gray-700">Número de Identificación</label>
                <input type="text" id="identification_number" name="identification_number"
                       value="{{ $employee->identification_number }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Identificación del empleado">
            </div>
    
            {{-- Salario --}}
            <div class="mb-4">
                <label for="salary" class="block text-sm font-medium text-gray-700">Salario</label>
                <input type="number" step="0.01" id="salary" name="salary"
                       value="{{ $employee->salary }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Salario del empleado">
            </div>
    
            {{-- Fecha de contratación --}}
            <div class="mb-6">
                <label for="hire_date" class="block text-sm font-medium text-gray-700">Fecha de Contratación</label>
                <input type="date" id="hire_date" name="hire_date"
                       value="{{ $employee->hire_date }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
    
            {{-- Botones --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('employees.index') }}"
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