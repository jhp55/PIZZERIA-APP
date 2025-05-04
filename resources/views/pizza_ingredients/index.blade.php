@extends('layouts.app')

@section('title', 'Relaciones Pizza-Ingrediente - JVJ Pizzería')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Relaciones Pizza-Ingrediente</h1>
        
        <a href="{{ route('ingredients.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded transition">
            Asignar Ingrediente
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($pizzaIngredients->isEmpty()))
        <div class="bg-white p-6 rounded-lg shadow text-center">
            <p class="text-gray-600">No hay relaciones establecidas entre pizzas e ingredientes.</p>
        </div>
    @else
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-yellow-500">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Pizza</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Ingrediente</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wider">Acción</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($pizzaIngredients as $relation)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                {{ $relation->pizza->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                {{ $relation->ingredient->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('pizza_ingredients.destroy', $relation->id) }}" 
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800 text-sm font-medium"
                                            onclick="return confirm('¿Eliminar esta relación?')">
                                        Quitar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection