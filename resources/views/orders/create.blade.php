@extends('layouts.app')

@section('title', 'Crear Pedido - JVJ Pizzería')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Nuevo Pedido</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- Campos del formulario (cliente, sucursal, etc.) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 mb-2">Cliente</label>
                    <select name="client_id" class="w-full border rounded p-2">
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Sucursal</label>
                    <select name="branch_id" class="w-full border rounded p-2">
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Agrega más campos según tu modelo -->
            </div>
            <button type="submit" class="mt-6 bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
                Guardar Pedido
            </button>
        </div>
    </form>
</div>
@endsection