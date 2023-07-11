@extends('administrador.admin')
@section('content')
    <div class=" bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700 relative overflow-x-auto shadow-md sm:rounded-lg"
        style="padding: 10px">
        <h1 class="text-center text-2xl font-extrabold">Datos del carrito</h1>
        {{-- DETALLES DEL USUARIO --}}
        <div class="relative overflow-x-auto ">
            <table class="w-full table-auto">
                <tr class="border-b">
                    <td class=" datos-pedido px-4 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-800">Codigo:</td>
                    <td class="px-4 py-2 whitespace-nowrap text-sm font-bold text-gray-800">{{ $carrito->id }}</td>
                </tr>
                <tr class="border-b">
                    <td class="datos-pedido px-4 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-800">Usuario:</td>
                    <td class="px-4 py-2 whitespace-nowrap text-sm font-bold text-gray-800">{{ $usuario->name}}</td>
                </tr>
                @php
                $fecha_str = $carrito->created_at;
                $fecha = new DateTime($fecha_str);
                @endphp
                <tr class="border-b">
                    <td class="datos-pedido px-4 py-2 whitespace-nowrap text-sm font-medium text-white bg-gray-800">Fecha:</td>
                    <td class="px-4 py-2 whitespace-nowrap text-sm font-bold text-gray-800">
                        {{ date_format($fecha, 'd/M/Y') }}</td>
                </tr>
            </table>


        </div>
        <br>
        <h1 class="text-center text-2xl font-extrabold">Productos</h1>
        <div class="relative overflow-x-auto ">
            <table style="width: 100%" class="min-w-full text-center table-auto">
                <thead class="border-b datos-pedido">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-1">Id</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-1">Nombre</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-1">Precio</th>
                    </tr>
                </thead>
                @foreach ($products as $product)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->pivot->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            RD${{ number_format($product->precio_oferta) }}</td>
                    </tr>

                @endforeach
                 @php
                     $total = $products->sum('precio_oferta');
                @endphp
                <tr class="bg-gray-200">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">Total:</td>
                    <td></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                        RD${{ number_format($total,2) }}</td>
                         <td></td>
                </tr>
            </table>
        </div>
    </div>
@endsection
