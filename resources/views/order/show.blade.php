@extends('layouts.app')

@section('title', 'Detalle Pedido - JVJ Pizzería')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Detalle del Pedido #{{ $order->id }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Cliente</label>
                <p class="mt-1 text-sm text-gray-900">{{ $order->client->name }}</p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Sucursal</label>
                <p class="mt-1 text-sm text-gray-900">{{ $order->branch->name }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Total</label>
                <p class="mt-1 text-sm text-gray-900">${{ number_format($order->total_price, 2) }}</p>
            </div>
        </div>

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Estado</label>
                <p class="mt-1 text-sm">
                    <span class="px-2 py-1 rounded-full text-xs 
                        @if($order->status == 'pendiente') bg-yellow-100 text-yellow-800
                        @elseif($order->status == 'en_preparacion') bg-blue-100 text-blue-800
                        @elseif($order->status == 'listo') bg-green-100 text-green-800
                        @else bg-gray-100 text-gray-800 @endif">
                        {{ str_replace('_', ' ', $order->status) }}
                    </span>
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tipo de entrega</label>
                <p class="mt-1 text-sm text-gray-900">
                    {{ $order->delivery_type == 'en_local' ? 'En local' : 'A domicilio' }}
                </p>
            </div>

            @if($order->delivery_person_id)
                <div>
                    <label class="block text-sm font-medium text-gray-700">Repartidor</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $order->deliveryPerson->name ?? 'N/A' }}</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Sección para items del pedido (pizzas) -->
    <div class="mb-8">
        <h2 class="text-lg font-medium text-gray-800 mb-4">Items del Pedido</h2>
        <!-- Aquí iría la lista de pizzas incluidas en el pedido -->
        <div class="bg-gray-50 p-4 rounded-lg">
            <p class="text-sm text-gray-500">Funcionalidad de items del pedido a implementar</p>
        </div>
    </div>

    <div class="flex justify-end space-x-4">
        <a href="{{ route('orders.edit', $order->id) }}"
           class="inline-block bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-2 px-4 rounded">
            Editar
        </a>
        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded"
                    onclick="return confirm('¿Eliminar este pedido?')">
                Eliminar
            </button>
        </form>
        <a href="{{ route('orders.index') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
            Volver a Pedidos
        </a>
    </div>
</div>
@endsection