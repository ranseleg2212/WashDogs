@extends('administrador.admin')
@section('content')
    <h1 class="text-center text-2xl font-extrabold">Mascotas</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <form class="flex items-center py-4" method="get" action="{{ route('control_user') }}">
            <label for="voice-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input value="{{ $texto ?? null }}" type="search" name="texto"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Buscar Mascotas">
            </div>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>Search
            </button>
        </form>
        <div class="relative overflow-x-auto ">
            <table class="min-w-full text-center table-fixed md-fixed sm:px-6 lg:px-8">
                <thead class="tabla-usuarios border-b">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">Id</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nombre</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">Edad</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">Condicion</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">Sexo</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">Raza</th>
                    </tr>
                </thead>
                @foreach ($mascotas as $mascota)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $mascota->mascota_id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $mascota->nombre }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $mascota->edad }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $mascota->condicion }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $mascota->genero }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $mascota->raza }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection


<style>
    th,
    td {
        padding: 5px;
    }
</style>
