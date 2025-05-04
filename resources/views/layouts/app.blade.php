<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'JVJ'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css','resources/css/style.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
            {{ $slot }}        
        </main>
        </div>

        <footer class="bg-neutral-400  py-8 px-4">
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">

              <!-- Logo y nombre -->
              <div>
                <h2 class="text-2xl font-bold mb-2">🍕 Pizzería JVJ</h2>
                <p class="text-sm">¡La mejor pizza artesanal, al horno de leña!</p>
              </div>

              <!-- Enlaces rápidos -->
              <div>
                <h3 class="text-xl font-semibold mb-2">Enlaces</h3>
                <ul class="space-y-1 text-sm">
                  <li><a href="/" class="hover:underline">Inicio</a></li>
                  <li><a href="/menu" class="hover:underline">Menú</a></li>
                  <li><a href="/pedidos" class="hover:underline">Haz tu pedido</a></li>
                  <li><a href="/contacto" class="hover:underline">Contáctanos</a></li>
                </ul>
              </div>

              <!-- Información de contacto -->
              <div>
                <h3 class="text-xl font-semibold mb-2">Contacto</h3>
                <p class="text-sm">📍 Calle 123 #45-67, Ciudad Pizza</p>
                <p class="text-sm">📞 (123) 456-7890</p>
                <p class="text-sm">✉️ contacto@jvj.com</p>
              </div>

            </div>

            <div class="mt-6 border-t border-natural-600 pt-4 text-center text-xs">
              &copy; 2025 Pizzería JVJ. Todos los derechos reservados.
            </div>
          </footer>

          
    </body>
</html>
