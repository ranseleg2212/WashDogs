@extends('administrador.admin')
@section('content')
<div class=" bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700" style="padding: 10px">
    <h2 class="text-center text-2xl font-extrabold" id="titulo-seccion">Cambiar Estado</h2>
<form action="{{route('editar_estado_pedido', $pedidoae)}}" method="post">
    @csrf
    @method('put')
    <label for="id_pedido_txt" class="block text-gray-700 text-sm font-bold mb-2">Id Pedido</label>
    <input type="text" readonly value="{{$pedidoae->id}}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    <br>
    <label for="estado_sel" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
    <select name="estado_sel" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <option value="{{$pedidoae->status}}">{{$pedidoae->status}}</option>
        <option value="En Proceso">En proceso</option>
        <option value="Cancelado">Cancelado</option>
        <option value="Entregado">Entregado</option>
    </select>
    <br>
    <br>
    <button type="submit" class="block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
</form>
</div>
@endsection
