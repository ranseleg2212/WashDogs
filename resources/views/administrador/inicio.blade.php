@extends('administrador.admin')
@section('content')

    {{-- <div class="card-group bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700"> --}}
        <div class="row bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700 p-5">
            <h3 class="text-center text-2xl font-extrabold text-gray-800">Nuevos pedidos</h3>
            <ul class="list-outside max-w-md space-y-1 text-gray-500 list-disc dark:text-gray-400">
                @if ($neworderscount == 0)
                    <li>No hay nuevos pedidos</li>
                @else
                @foreach ($neworders as $neworder)
                <li class="text-black"><strong class="text-orange-700">Nombre</strong> {{$neworder->name}}<br> <strong class="text-orange-700">Total</strong> RD$ {{number_format($neworder->total,2)}}<br> <strong class="text-orange-700">Fecha</strong> {{$neworder->fecha}}</li>
                @endforeach
                @endif
            </ul>
        </div>
    <div class="row bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700 px-5 py-3">
        <h1 class="text-center text-2xl font-extrabold py-1 text-orange-600">Bienvenido {{ Auth::user()->name }}</h1>
        <br><br>
        <h3 class="text-center text-2xl font-extrabold text-gray-800 py-1">Datos Generales</h3>
        <br>
        {{-- PRODUCTOS --}}
        <div class="col">
            <div class="card">
                <div
                    class="text-center bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700">
                    <div class="p-5">
                        <svg class="w-full" width="170px" height="170px" viewBox="0 0 512.00 512.00" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ff6a1a" stroke="#ff6a1a"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>product-management</title> <g id="Page-1" stroke-width="0.00512" fill="none" fill-rule="evenodd"> <g id="icon" fill="#000000" transform="translate(42.666667, 34.346667)"> <path d="M426.247658,366.986259 C426.477599,368.072636 426.613335,369.17172 426.653805,370.281095 L426.666667,370.986667 L426.666667,392.32 C426.666667,415.884149 383.686003,434.986667 330.666667,434.986667 C278.177524,434.986667 235.527284,416.264289 234.679528,393.025571 L234.666667,392.32 L234.666667,370.986667 L234.679528,370.281095 C234.719905,369.174279 234.855108,368.077708 235.081684,366.992917 C240.961696,371.41162 248.119437,375.487081 256.413327,378.976167 C275.772109,387.120048 301.875889,392.32 330.666667,392.32 C360.599038,392.32 387.623237,386.691188 407.213205,377.984536 C414.535528,374.73017 420.909655,371.002541 426.247658,366.986259 Z M192,7.10542736e-15 L384,106.666667 L384.001134,185.388691 C368.274441,181.351277 350.081492,178.986667 330.666667,178.986667 C301.427978,178.986667 274.9627,184.361969 255.43909,193.039129 C228.705759,204.92061 215.096345,223.091357 213.375754,241.480019 L213.327253,242.037312 L213.449,414.75 L192,426.666667 L-2.13162821e-14,320 L-2.13162821e-14,106.666667 L192,7.10542736e-15 Z M426.247658,302.986259 C426.477599,304.072636 426.613335,305.17172 426.653805,306.281095 L426.666667,306.986667 L426.666667,328.32 C426.666667,351.884149 383.686003,370.986667 330.666667,370.986667 C278.177524,370.986667 235.527284,352.264289 234.679528,329.025571 L234.666667,328.32 L234.666667,306.986667 L234.679528,306.281095 C234.719905,305.174279 234.855108,304.077708 235.081684,302.992917 C240.961696,307.41162 248.119437,311.487081 256.413327,314.976167 C275.772109,323.120048 301.875889,328.32 330.666667,328.32 C360.599038,328.32 387.623237,322.691188 407.213205,313.984536 C414.535528,310.73017 420.909655,307.002541 426.247658,302.986259 Z M127.999,199.108 L128,343.706 L170.666667,367.410315 L170.666667,222.811016 L127.999,199.108 Z M42.6666667,151.701991 L42.6666667,296.296296 L85.333,320.001 L85.333,175.405 L42.6666667,151.701991 Z M330.666667,200.32 C383.155809,200.32 425.80605,219.042377 426.653805,242.281095 L426.666667,242.986667 L426.666667,264.32 C426.666667,287.884149 383.686003,306.986667 330.666667,306.986667 C278.177524,306.986667 235.527284,288.264289 234.679528,265.025571 L234.666667,264.32 L234.666667,242.986667 L234.808715,240.645666 C237.543198,218.170241 279.414642,200.32 330.666667,200.32 Z M275.991,94.069 L150.412,164.155 L192,187.259259 L317.866667,117.333333 L275.991,94.069 Z M192,47.4074074 L66.1333333,117.333333 L107.795,140.479 L233.373,70.393 L192,47.4074074 Z" id="Combined-Shape"> </path> </g> </g> </g></svg>
                        <h4 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-black">Productos</h4>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Activos: {{ $productac }}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Inactivos: {{ $productin }}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Oferta: {{ $productof }}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total: {{ $producttt }}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">.</p>
                        <div class="d-flex justify-content-end">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- PEDIDOS --}}
        <div class="col">
            <div class="card">
                <div
                    class="text-center bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700">
                    <div class="p-5">
                        <svg class="w-full" width="170px" height="170px" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6.50001 5.5C8.50003 5.5 8.50003 8 8.50003 8V9.5M6.50001 5.5C4.5 5.5 4.5 8 4.5 8L4.50001 9.5H8.50003M6.50001 5.5C6.50001 5.5 15.8333 5.5 17.6667 5.5C19.5 5.5 19.5 8.5 19.5 8.5V20L17.6667 19L15.8333 20L14 19L12.1667 20L10.3334 19L8.50003 20V9.5M11 12.5H15M11 9.5H16M11 15.5H16" stroke="#121923" stroke-width="1.2"></path> </g></svg>
                        <h4 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-black">Pedidos</h4>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Entregados: {{ $pedidosen }}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Pendientes: {{ $pedidosep }}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Cancelados: {{ $pedidosca }}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Registrados: {{ $pedidosre }}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total: {{ $pedidostt }}</p>
                        <div class="d-flex justify-content-end">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
