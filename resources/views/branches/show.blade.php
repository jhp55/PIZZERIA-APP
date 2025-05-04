@extends('layouts.app')

@section('title', 'Detalle Sucursal - JVJ Pizzería')

@section('content')
<div class="max-w-xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Detalle de Sucursal</h1>

    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">ID</label>
            <p class="mt-1 text-sm text-gray-900">{{ $branch->id }}</p>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700">Nombre</label>
            <p class="mt-1 text-sm text-gray-900">{{ $branch->name }}</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Dirección</label>
            <p class="mt-1 text-sm text-gray-900">{{ $branch->address }}</p>
        </div>
    </div>

    <div class="flex justify-end space-x-4 mt-6">
        <a href="{{ route('branches.edit', $branch->id) }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
            Editar
        </a>
        <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded"
                    onclick="return confirm('¿Estás seguro de eliminar esta sucursal?')">
                Eliminar
            </button>
        </form>
        <a href="{{ route('branches.index') }}"
           class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded">
            Volver
        </a>
    </div>
</div>
@endsection