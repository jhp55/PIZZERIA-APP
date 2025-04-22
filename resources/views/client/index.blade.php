<x-app-layout>
    @section('title', 'Clients - JVJ Pizzería')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
      <h1 class="text-2xl font-bold text-gray-800 mb-6">Listado de Clientes</h1>
  
      <a href="{{ route('clients.create')}}" class="mb-4 inline-block bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded transition">Agregar Cliente</a>
  
      <div class="overflow-x-auto bg-white shadow-md rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-100">
                  <tr>
                      <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Código</th>
                      <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Usuario</th>
                      <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Dirección</th>
                      <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Teléfono</th>
                  </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                  @foreach ($clients as $client)
                      <tr class="hover:bg-gray-50">
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $client->id }}</td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $client->user_id }}</td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $client->address }}</td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $client->phone }}</td>
  
                          {{-- Acciones --}}
                          {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                              <a href="{{ route('clients.edit', ['client' => $client->id]) }}"
                                 class="text-blue-600 hover:text-blue-800 mr-3">Editar</a>
  
                              <form action="{{ route('clients.destroy', ['client' => $client->id]) }}" method="POST" class="inline">
                                  @csrf
                                  @method('delete')
                                  <button type="submit" class="text-red-600 hover:text-red-800">Eliminar</button>
                              </form>
                          </td> --}}
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  

</x-app-layout>