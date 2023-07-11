@extends('administrador.admin')
@section('content')
    <h2 class="text-center text-2xl font-extrabold" id="titulo-seccion">Actualizar Usuario</h2>
    <br><br>
    <div class="row justify-content-center">
        <form class="w-full max-w-lg" action="{{ route('guardar_user', $usuario) }}" method="post">
            @csrf
            @method('put')
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Usuario
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        name="usuario_txt" type="text" value="{{ $usuario->name }}">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Administrador
                    </label>
                    <select
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="admin_txt">
                        <option value="{{ $usuario->admin }}">{{ $usuario->admin }}</option>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Email
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="email_txt" type="email" value="{{ $usuario->email }}">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Clave
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="clave_txt" type="password" placeholder="******************">
                    <p class="text-yellow-600 text-xs">Dejar vacio si no la va a cambiar</p>
                </div>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                style="width: 100%">Actualizar</button>
        </form>
    </div>
@endsection
