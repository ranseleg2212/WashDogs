@extends('administrador.admin')
@section('content')
<h1 class="text-center text-2xl font-extrabold">Control de Pedidos</h1>

@if (session()->has('messagepedido'))
<div class="alert alert-success alert-dismissible fade show bg-lime-800 text-white" role="alert">
    {{ session('messagepedido') }}
    <button type="button" class="btn-close bg-red-900 text-white font-extrabold" data-bs-dismiss="alert"
        aria-label="Close">x</button>
</div>
@endif

<div class="shadow-md sm:rounded-lg p-2">
    {{-- !PEDIDOS NUEVOS --}}
    <div class="row bg-neutral-900 border border-gray-200 rounded-lg dark:bg-white dark:border-gray-700 p-3">
        <h5 class="text-center text-base font-extrabold text-blue-600">Nuevos</h5>
        <ul class="list-outside max-w-md space-y-1 text-gray-500 list-disc dark:text-gray-400">
            @if (empty($pedidosnuevos))
            <li>No hay nuevos pedidos</li>
            @else
            @foreach ($pedidosnuevos as $neworder)
            <li class="text-black"><strong class="text-orange-700">#</strong> {{ $neworder->id }}<br><strong
                    class="text-orange-700">Nombre</strong> {{ $neworder->name }}<br> <strong
                    class="text-orange-700">Total</strong> RD$ {{ number_format($neworder->total, 2) }}<br>
                <strong class="text-orange-700">Fecha</strong> {{ date_format($neworder->created_at, 'd/M/Y') }}
            </li>
            @endforeach
            @endif
        </ul>
    </div>
    {{-- !FIN PEDIDOS NUEVOS --}}
    <form class="flex items-center py-4" method="get" action="{{ route('control_pedido') }}">
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
                placeholder="Buscar pedidos" list="buscarped">
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
    {{-- !OPCIONES DE BUSQUEDA DE PEDIDOS --}}
    <datalist id="buscarped">
        <option value="En Proceso">
        <option value="Cancelado">
        <option value="Entregado">
        <option value="Registrado">
    </datalist>
    {{-- !FIN OPCIONES DE BUSQUEDA DE PEDIDOS --}}
    <div class="relative overflow-x-auto ">
        <table class="min-w-full text-center table-fixed md-fixed sm:px-6 lg:px-8" id="tabla_pedidos">
            <thead class="tabla-pedidos border-b">
                <tr>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Codigo</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Fecha R</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nombre</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Mascota</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Estado</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Tel</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Total</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Fecha O</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">____</th>
                </tr>
            </thead>
            @foreach ($pedidos as $pedido)
            <tr class="bg-white border-b">
                <td class="px-1 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $pedido->id }}</td>
                <td class="px-1 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ date_format(new DateTime($pedido->created_at), 'd/M/Y') }}
                </td>
                <td class="px-1 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$pedido->user->name }}</td>
                <td class="px-1 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $pedido->mascota->nombre }}
                </td>
                @if ($pedido->status == 'Completado')
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-900">
                    {{ $pedido->status }}
                </td>
                @elseif ($pedido->status == 'Cancelado')
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-900">{{ $pedido->status }}
                </td>
                @elseif ($pedido->status == 'Registrado')
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600 font-bold">
                    {{ $pedido->status }}</td>
                @else
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600">
                    {{ $pedido->status }}
                </td>
                @endif
                <td class="px-1 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$pedido->user->telefono }}</td>
                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">RD$
                    {{ number_format($pedido->total, 2) }}</td>
                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">{{ $pedido->fecha }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900"><a
                        href="{{ route('detalle_pedido', $pedido->id) }}" class="btn btn-sm btn-primary">Detalles</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
{{ $pedidos->links() }}

@endsection
