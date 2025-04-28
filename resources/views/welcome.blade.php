<x-app-layout>
    @section('title', 'Inicio - JVJ Pizzería')

    <section class="bg-gray-100 py-10 px-4">
      <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
    
        <!-- IMAGEN PRINCIPAL GRANDE (ocupa dos filas) -->
        <div class="md:row-span-2">
          <img src="{{ asset('img/img4.png') }}" alt="Promo Pizza Grande" class="w-full rounded-xl shadow-lg object-cover">
        </div>
    
        <!-- IMAGEN PEQUEÑA 1 -->
        <div>
          <img src="{{ asset('img/img3.png') }}" alt="Promo Pizza Mediana" class="w-full rounded-xl shadow-lg object-cover">
        </div>
    
        <!-- IMAGEN PEQUEÑA 2 -->
        <div>
          <img src="{{ asset('img/img2.png') }}" alt="Promo ExtragranDE" class="w-full rounded-xl shadow-lg object-cover">
        </div>
    
        <!-- IMAGEN HORIZONTAL COMBO -->
        <div class="md:col-span-3">
          <img src="{{ asset('img/img1.jpeg') }}" alt="Promo Combo" class="w-full rounded-xl shadow-lg object-cover">
        </div>
    
      </div>
    </section>
      
</x-app-layout>