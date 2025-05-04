@extends('layouts.app')

@section('title', 'Pedidos - JVJ Pizzería')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Listado de Pedidos</h1>

    <a href="{{ route('orders.create') }}"
       class="mb-4 inline-block bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded transition">
        Nuevo Pedido
    </a>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-yellow-500">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Cliente</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Sucursal</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Total</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($orders as $order)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#{{ $order->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->client->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $order->branch->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${{ number_format($order->total_price, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2 py-1 rounded-full text-xs 
                                @if($order->status == 'pendiente') bg-yellow-100 text-yellow-800
                                @elseif($order->status == 'en_preparacion') bg-blue-100 text-blue-800
                                @elseif($order->status == 'listo') bg-green-100 text-green-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ str_replace('_', ' ', $order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('orders.show', $order->id) }}" 
                               class="text-blue-600 hover:text-blue-800 mr-3">Ver</a>
                            <a href="{{ route('orders.edit', $order->id) }}" 
                               class="text-yellow-600 hover:text-yellow-800 mr-3">Editar</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800"
                                        onclick="return confirm('¿Eliminar este pedido?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection