<x-app-layout>

@section('title', 'Editar Pedido - JVJ Pizzería')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Editar Pedido #{{ $order->id }}</h1>

    <form method="POST" action="{{ route('orders.update', $order->id) }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="client_id" class="block text-sm font-medium text-gray-700">Cliente</label>
                <select id="client_id" name="client_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ $order->client_id == $client->id ? 'selected' : '' }}>
                            {{ $client->name }}
                        </option>
                    @endforeach
                </select>
                @error('client_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="branch_id" class="block text-sm font-medium text-gray-700">Sucursal</label>
                <select id="branch_id" name="branch_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}" {{ $order->branch_id == $branch->id ? 'selected' : '' }}>
                            {{ $branch->name }}
                        </option>
                    @endforeach
                </select>
                @error('branch_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="total_price" class="block text-sm font-medium text-gray-700">Total</label>
                <input type="number" id="total_price" name="total_price" step="0.01" min="0" 
                       value="{{ old('total_price', $order->total_price) }}" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('total_price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
                <select id="status" name="status" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="pendiente" {{ $order->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en_preparacion" {{ $order->status == 'en_preparacion' ? 'selected' : '' }}>En preparación</option>
                    <option value="listo" {{ $order->status == 'listo' ? 'selected' : '' }}>Listo</option>
                    <option value="entregado" {{ $order->status == 'entregado' ? 'selected' : '' }}>Entregado</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="delivery_type" class="block text-sm font-medium text-gray-700">Tipo de entrega</label>
                <select id="delivery_type" name="delivery_type" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="en_local" {{ $order->delivery_type == 'en_local' ? 'selected' : '' }}>En local</option>
                    <option value="a_domicilio" {{ $order->delivery_type == 'a_domicilio' ? 'selected' : '' }}>A domicilio</option>
                </select>
                @error('delivery_type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="delivery_person_id" class="block text-sm font-medium text-gray-700">Repartidor</label>
                <select id="delivery_person_id" name="delivery_person_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Sin repartidor</option>
                    @foreach($deliveryPeople as $person)
                        <option value="{{ $person->id }}" {{ $order->delivery_person_id == $person->id ? 'selected' : '' }}>
                            {{ $person->name }}
                        </option>
                    @endforeach
                </select>
                @error('delivery_person_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end space-x-4 mt-8">
            <a href="{{ route('orders.index') }}"
               class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded">
                Cancelar
            </a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Actualizar Pedido
            </button>
        </div>
    </form>
</div>
</x-app-layout>