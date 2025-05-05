<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-8 text-center">Panel de Administración</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('clients.index') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-4 rounded-lg shadow-lg text-center transition duration-300 flex items-center justify-center space-x-2">
                <i class="fas fa-users"></i> <!-- Icono de usuarios -->
                <span>Clientes</span>
            </a>
            <a href="{{ route('employees.index') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-4 rounded-lg shadow-lg text-center transition duration-300 flex items-center justify-center space-x-2">
                <i class="fas fa-user-tie"></i> <!-- Icono de empleado -->
                <span>Empleados</span>
            </a>
            <a href="{{ route('pizzas.index') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-4 rounded-lg shadow-lg text-center transition duration-300 flex items-center justify-center space-x-2">
                <i class="fas fa-pizza-slice"></i> <!-- Icono de pizza -->
                <span>Pizzas</span>
            </a>
            <a href="{{ route('pizza_sizes.index') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-4 rounded-lg shadow-lg text-center transition duration-300 flex items-center justify-center space-x-2">
                <i class="fas fa-random"></i> <!-- Icono de tamaños -->
                <span>Tamaños de Pizza</span>
            </a>
            <a href="{{ route('ingredients.index') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-4 rounded-lg shadow-lg text-center transition duration-300 flex items-center justify-center space-x-2">
                <i class="fas fa-lemon"></i> <!-- Icono de ingredientes -->
                <span>Ingredientes</span>
            </a>
            <a href="{{ route('extra_ingredients.index') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-4 rounded-lg shadow-lg text-center transition duration-300 flex items-center justify-center space-x-2">
                <i class="fas fa-pepper-hot"></i> <!-- Icono de ingredientes extras -->
                <span>Ingredientes Extras</span>
            </a>
            <a href="{{ route('branches.index') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-4 rounded-lg shadow-lg text-center transition duration-300 flex items-center justify-center space-x-2">
                <i class="fas fa-store"></i> <!-- Icono de sucursal -->
                <span>Sucursales</span>
            </a>
            <a href="{{ route('orders.index') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-4 rounded-lg shadow-lg text-center transition duration-300 flex items-center justify-center space-x-2">
                <i class="fas fa-clipboard-list"></i> <!-- Icono de órdenes -->
                <span>Órdenes</span>
            </a>
            <a href="{{ route('order_pizza.index') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-4 rounded-lg shadow-lg text-center transition duration-300 flex items-center justify-center space-x-2">
                <i class="fas fa-pizza-slice"></i> <!-- Icono de órdenes pizza -->
                <span>Órdenes Pizza</span>
            </a>
            <a href="{{ route('order_extra_ingredient.index') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-4 rounded-lg shadow-lg text-center transition duration-300 flex items-center justify-center space-x-2">
                <i class="fas fa-plus-circle"></i> <!-- Icono de ingredientes extras -->
                <span>Órdenes Ingredientes Extra</span>
            </a>
            <a href="{{ route('suppliers.index') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-4 rounded-lg shadow-lg text-center transition duration-300 flex items-center justify-center space-x-2">
                <i class="fas fa-truck"></i> <!-- Icono de proveedor -->
                <span>Proveedores</span>
            </a>
            <a href="{{ route('raw_materials.index') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-4 rounded-lg shadow-lg text-center transition duration-300 flex items-center justify-center space-x-2">
                <i class="fas fa-cogs"></i> <!-- Icono de materias primas -->
                <span>Materias Primas</span>
            </a>
            <a href="{{ route('purchases.index') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-4 rounded-lg shadow-lg text-center transition duration-300 flex items-center justify-center space-x-2">
                <i class="fas fa-shopping-cart"></i> <!-- Icono de compras -->
                <span>Compras</span>
            </a>
            <a href="{{ route('pizza_raw_materials.index') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-4 rounded-lg shadow-lg text-center transition duration-300 flex items-center justify-center space-x-2">
                <i class="fas fa-pizza-slice"></i> <!-- Icono de pizza y materias primas -->
                <span>Pizza Materia Prima</span>
            </a>
        </div>
        
    </div>
</x-app-layout>
