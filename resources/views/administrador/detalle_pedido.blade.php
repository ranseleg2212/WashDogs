@extends('administrador.admin')
@section('content')
<div class=" bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700 relative overflow-x-auto shadow-md sm:rounded-lg"
    style="padding: 10px">
    <h1 class="text-center text-2xl font-extrabold">Datos del Pedidos</h1>
    {{-- DETALLES DEL CLIENTE --}}
    <div class="relative overflow-x-auto ">
        <table class="w-full table-auto">
            @if ($order->status == 'Cancelado')
            <tr class="border-b">
                <td colspan="2" class="px-4 py-2 whitespace-nowrap text-sm text-white bg-red-800 font-bold">PEDIDO
                    CANCELADO: {{ $order->comentario }}</td>
            </tr>
            @elseif ($order->status == 'Entregado')
            <td colspan="2" class="px-4 py-2 whitespace-nowrap text-sm text-white bg-green-700 font-bold">Pedido
                entregado por: {{ $order->persona_entrega }}, en {{$order->lugar_entrega}} a las
                {{$order->hora_entrega}}. Lo recibió {{$order->recibido_entrega}}</td>
            @endif
            <tr class="border-b">
                <td class="datos-pedido px-4 py-2 whitespace-nowrap text-sm font-medium text-white">Codigo:</td>
                <td class="px-4 py-2 whitespace-nowrap text-sm font-bold text-gray-800">{{ $order->id }}</td>
            </tr>
            <tr class="border-b">
                <td class="datos-pedido px-4 py-2 whitespace-nowrap text-sm font-medium text-white">Direccion:</td>
                <td class="px-4 py-2 whitespace-nowrap text-sm font-bold text-gray-800">{{ $order->user->direccion }}
                </td>
            </tr>
            <tr class="border-b">
                <td class="datos-pedido px-4 py-2 whitespace-nowrap text-sm font-medium text-white">Fecha de registro:
                </td>
                <td class="px-4 py-2 whitespace-nowrap text-sm font-bold text-gray-800">
                    {{ date_format($order->created_at, 'd/M/Y') }}</td>
            </tr>
            <tr class="border-b">
                <td class="datos-pedido px-4 py-2 whitespace-nowrap text-sm font-medium text-white">Fecha de cita:</td>
                <td class="px-4 py-2 whitespace-nowrap text-sm font-bold text-gray-800">
                    {{ $order->fecha }}
                    <button type="button" class="my-1 btn btn-sm bg-blue-600 text-white hover:bg-blue-700"
                        data-bs-toggle="modal" data-bs-target="#editarfechamodal{{$order->id}}">
                        Editar
                    </button>
                    {{-- * Modal --}}
                    <div class="modal fade" id="editarfechamodal{{$order->id}}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cambio de fecha
                                        {{ $order->id }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">X</button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('cambiar_fecha_pedido', ['pedido'=>$order->id]) }}" method="POST" role="form"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                <label
                                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="grid-first-name">
                                                    Pedido
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                    name="pedido_txt" type="text" value="{{ $order->id }}">
                                            </div>
                                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                <label
                                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                    for="grid-first-name">
                                                    Pedido
                                                </label>
                                                <input
                                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                    name="fecha_hora" id="fecha_hora" type="datetime-local"
                                                    value="{{ $order->fecha ?? null }}">
                                                <script>
                                                    // Obtener la referencia al elemento de entrada
                                                        var fechaHoraInput = document.getElementById("fecha_hora");

                                                        // Obtener la fecha y hora actual
                                                        var fechaHoraActual = new Date();

                                                        // Establecer la fecha mínima permitida como la fecha actual
                                                        fechaHoraInput.min = fechaHoraActual.toISOString().slice(0, 16); // Recortar segundos y milisegundos

                                                        // Establecer las horas permitidas (desde las 8:00 AM hasta las 5:00 PM)
                                                        fechaHoraInput.addEventListener("input", function() {
                                                            var fechaHoraSeleccionada = new Date(this.value);

                                                            // Obtener la hora de la fecha seleccionada
                                                            var horaSeleccionada = fechaHoraSeleccionada.getHours();

                                                            // Restringir las horas permitidas
                                                            if (horaSeleccionada < 8 || horaSeleccionada >= 17) {
                                                                this.setCustomValidity("La hora debe estar entre las 8:00 AM y las 5:00 PM.");
                                                            } else {
                                                                this.setCustomValidity(""); // Restablecer la validez personalizada
                                                            }
                                                        });
                                                </script>
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
                    {{-- *FIN MODAL --}}
                </td>
            </tr>
        </table>
    </div>
    <div class="relative overflow-x-auto ">
        {{-- FIN DETALLE DEL CLIENTE --}}
        <table style="width: 100%" class="min-w-full text-center table-auto">
            <thead class="datos-pedido border-b">
                <tr>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-1">Nombre</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-1">Email</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-1">Tel</th>
                </tr>
            </thead>
            <tr class="bg-white border-b">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->user->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->user->email }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->user->direccion }}
                </td>
            </tr>
        </table>
        {{-- MASCOTAS --}}
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
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->mascota->nombre}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->mascota->raza}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->mascota->edad}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->mascota->genero}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$order->mascota->condicion}}
                </td>
            </tr>
        </table>
    </div>
    <br>
    <h1 class="text-center text-2xl font-extrabold">Productos</h1>
    <div class="relative overflow-x-auto ">
        <table style="width: 100%" class="min-w-full text-center table-auto">
            <thead class="datos-pedido border-b">
                <tr>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-1">Id</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-1">Nombre</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-1">Precio</th>


                </tr>
            </thead>
            @foreach ($order->shoppingCart->products as $product)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    RD${{ number_format($product->precio_oferta, 2) }}</td>
                {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $product->pivot->cantidad }}</td> --}}
                {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    RD${{ number_format($subtotal, 2) }}</td> --}}
            </tr>
            @endforeach
            <tr class="bg-gray-200">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">Total:</td>
                {{-- <td></td> --}}
                {{-- <td></td> --}}
                <td></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                    RD${{ number_format($order->total, 2) }}</td>
            </tr>

        </table>
    </div>
    <button type="button" class="border-none col-12 my-1 btn btn-primary btn-modal bg-blue-400 text-blue-900 hover:font-bold"
        data-bs-toggle="modal" data-bs-target="#estadopedidomodal{{ $order->id }}">
        Estado
    </button>

    <a href="{{route('agregar_producto_carrito',$order->shopping_cart_id)}}" class="col-12 my-1 text-white border-none btn btn-primary bg-gray-600 hover:bg-neutral-600 hover:font-bold">Agregar servicio</a>
    {{-- !MODAL --}}
    <div class="modal fade" id="estadopedidomodal{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cambiar estado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('editar_estado_pedido', ['pedido' => $order]) }}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <label for="id">Id pedido</label>
                        <input type="text" name="id" id="" value="{{ $order->id }}" readonly class="form-control">
                        <label for="estado_sel" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                        <select id="estado_sel" name="estado_seli"
                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Pendente" @if ($order->status == 'Registrado') selected @endif>Registrado
                            </option>
                            <option value="En proceso" @if ($order->status == 'En proceso') selected @endif>En proceso
                            </option>
                            <option value="Entregado" @if ($order->status == 'Completado') selected @endif>Completado
                            </option>
                            <option value="Cancelado" @if ($order->status == 'Cancelado') selected @endif>Cancelado
                            </option>
                        </select>
                        <div id="razon_cancelacion" style="display: none">
                            <label for="razon_cancelacion_txt"
                                class="block text-gray-700 text-sm font-bold mb-2">Motivo</label>
                            <input type="text" name="razon_cancelacion_txt" id="rzcn"
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Razón de cancelación">
                        </div>
                        <button type="submit"
                            class="my-2 btn block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-red-700 text-white font-extrabold hover:bg-red-900 w-full"
                        data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // 1. Crear una función con el código que deseas ejecutar
            function actualizarInputs() {
                const estadoSel = document.querySelector('#estado_sel');
                const razonCancelacionDiv = document.querySelector('#razon_cancelacion');
                const razonCancelacionInp = document.querySelector('#rzcn');
                const lugarHorapersonaEntregaDiv = document.querySelector('#lugar_persona_hora_entrega');
                const lugarEntrega = document.querySelector('#lgen');
                const horaEntrega = document.querySelector('#hren');
                const entregadoEntrega = document.querySelector('#psen');
                const recibidoEntrega = document.querySelector('#rcen');

                const selectedOption = estadoSel.value;

                if (selectedOption == "Cancelado") {
                    razonCancelacionDiv.style.display = 'block';
                    razonCancelacionInp.value = "{{ $order->comentario }}";
                    lugarHorapersonaEntregaDiv.style.display = 'none';
                }  else {
                    razonCancelacionDiv.style.display = 'none';
                    lugarHorapersonaEntregaDiv.style.display = 'none';
                }
            }

            // 2. Llamar a la función para que se ejecute inmediatamente
            actualizarInputs();

            // 3. Agregar la función como manejador de eventos para el evento "change" del elemento select
            const estadoSel = document.querySelector('#estado_sel');
            estadoSel.addEventListener('change', actualizarInputs);
    </script>
    {{-- !FIN MODAL --}}
</div>
@endsection
