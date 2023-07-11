@extends('layouts.app')
@section('content')
<div>
    <div class="sm:rounded-lg bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700"
        style="padding: 10px">
        <h1 class="text-center text-2xl font-extrabold">Datos del Compra</h1>
        {{-- DETALLES DEL CLIENTE --}}
        <div class="relative overflow-x-auto ">
            <table class="w-full table-auto">
                <tr class="border-b">
                    <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-white" style=" background-color: #756c63!important;">Codigo:</td>
                    <td class="px-4 py-2 whitespace-nowrap text-sm font-bold text-gray-800">{{ $order->id }}</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-white" style=" background-color: #756c63!important;">Fecha:</td>
                    <td class="px-4 py-2 whitespace-nowrap text-sm font-bold text-gray-800">
                        {{ $order->fecha }}</td>
                </tr>
            </table>
        </div>
        {{-- FIN DETALLE DEL CLIENTE --}}
        <div class="relative overflow-x-auto ">
            <table style="width: 100%" class="min-w-full text-center table-auto">
                <thead class="border-b" style=" background-color: #756c63!important;">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-1">Nombre</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-1">Email</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-1">Tel</th>
                    </tr>
                </thead>
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->user->telefono }}</td>
                </tr>
            </table>
            <table style="width: 100%" class="min-w-full text-center table-auto">
                <thead class="datos-pedido border-b">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-1">Nombre</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-1">Raza</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-1">Edad</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-1">Genero</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-1">Condicion</th>
                    </tr>
                </thead>
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->mascota->nombre}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->mascota->raza}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->mascota->edad}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->mascota->genero}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->mascota->condicion}}</td>
                </tr>
            </table>
        </div>
        <br>
        <h1 class="text-center text-2xl font-extrabold">Descripción</h1>
        <div class="relative overflow-x-auto ">
            <table style="width: 100%" class="min-w-full text-center table-auto">
                <thead class="border-b" style=" background-color: #756c63!important;">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-1">Id</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-1">Servicio</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-1">Precio</th>

                    </tr>
                </thead>
                @foreach ($order->shoppingCart->products as $product)
                @php
                $subtotal = $product->pivot->cantidad * $product->precio_oferta;
                @endphp
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        RD${{ number_format($product->precio_oferta,2) }}</td>
                </tr>
                @endforeach
                <tr class="bg-gray-200">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">Total:</td>
                    <td></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                        RD${{ number_format($order->total,2) }}</td>
                </tr>

            </table>
        </div>
    </div>
</div>
@endsection
