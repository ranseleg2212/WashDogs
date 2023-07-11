@extends('administrador.admin')
@section('content')
    <h1 class="text-center text-2xl font-extrabold">Carritos de compra</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <form class="flex items-center py-4" method="get" action="{{ route('mostrar_carritos') }}">
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
                <input value="{{ $texto ?? null }}" type="search" name="textocarrito"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Buscar usuarios">
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
                <thead class="tabla-carrito border-b">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">Id</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">Usuario</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">Fecha</th>
                    </tr>
                </thead>
                @foreach ($carritos as $carrito)
                @php
                $fecha_str = $carrito->created_at;
                $fecha = new DateTime($fecha_str);
                @endphp
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $carrito->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900"><a
                                href="{{ route('mostrar_carrito', $carrito->id) }}">{{ $carrito->name }}</a></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ date_format($fecha, 'd/M/Y') }}</td>
                        {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $usuario->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">

                            <button type="button" class="my-1 btn btn-sm bg-green-600 text-white hover:bg-green-700"
                                data-bs-toggle="modal" data-bs-target="#editarusuariomodal{{$usuario->id}}">
                                Editar
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="editarusuariomodal{{$usuario->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar usuario
                                                {{ $usuario->id }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">X</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('guardar_user', $usuario) }}" method="POST"
                                                role="form" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="flex flex-wrap -mx-3 mb-6">
                                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                        <label
                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                            for="grid-first-name">
                                                            Usuario
                                                        </label>
                                                        <input
                                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                            name="usuario_txt" type="text" value="{{ $usuario->name }}">
                                                    </div>
                                                    <div class="w-full md:w-1/2 px-3">
                                                        <label
                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                            for="grid-last-name">
                                                            Administrador
                                                        </label>
                                                        <select
                                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                            name="admin_txt">
                                                            <option value="{{ $usuario->admin }}">{{ $usuario->admin }}
                                                            </option>
                                                            <option value="1">Si</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap -mx-3 mb-6">
                                                    <div class="w-full px-3">
                                                        <label
                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                            for="grid-password">
                                                            Email
                                                        </label>
                                                        <input
                                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                            name="email_txt" type="email" value="{{ $usuario->email }}">
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap -mx-3 mb-6">
                                                    <div class="w-full px-3">
                                                        <label
                                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                            for="grid-password">
                                                            Clave
                                                        </label>
                                                        <input
                                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                            name="clave_txt" type="password"
                                                            placeholder="******************">
                                                        <p class="text-yellow-600 text-xs">Dejar vacio si no la va a
                                                            cambiar</p>
                                                    </div>
                                                </div>
                                                <button type="submit"
                                                    class="my-2 btn block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                class="btn bg-red-700 text-white font-extrabold hover:bg-red-900 w-full"
                                                data-bs-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td> --}}
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
