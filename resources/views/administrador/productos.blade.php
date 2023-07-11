@extends('administrador.admin')
@section('content')
<h1 class="text-center text-2xl font-extrabold">Control de Servicios</h1>
{{-- ! --}}
<button type="button" class="my-1 btn btn-md bg-blue-500 text-white hover:bg-blue-700" data-bs-toggle="modal"
    data-bs-target="#agregarproductomodal">
    Nuevo producto
</button>
{{-- !CREAR PRODUCTO --}}
<div class="modal fade" id="agregarproductomodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.create') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" name="name" class="form-control mb-2">
                    @error('name')
                    <p class="text-danger mb-2">{{ $message }}</p>
                    @enderror

                    <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <textarea cols="20" rows="5" name="description" class="form-control mb-2"></textarea>
                    @error('description')
                    <p class="text-danger mb-2">{{ $message }}</p>
                    @enderror

                    <label class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                    <input type="number" name="price" class="form-control mb-2">
                    @error('price')
                    <p class="text-danger mb-2">{{ $message }}</p>
                    @enderror
                    {{-- <label class="block text-gray-700 text-sm font-bold mb-2">Cantidad</label>
                    <input type="number" name="cantidad_disponible_ag_txt" wire:model="cantidad_disponible_ag"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
                    <label class="block text-gray-700 text-sm font-bold mb-2">Thumbnail</label>
                    <input type="file" name="imagen" id="imagen-input" class="form-control mb-2">
                    <div class="thumbnail-preview">
                        <img src="" id="imagen-preview-img" class="img-fluid mb-2" alt="">
                        <span id="preview-placeholder">Arrastra una imagen</span>
                    </div>

                    <script>
                        const input = document.getElementById('imagen-input');
                            const preview = document.getElementById('imagen-preview');
                            const previewImg = document.getElementById('imagen-preview-img');
                            const placeholder = document.getElementById('preview-placeholder');

                            input.addEventListener('change', () => {
                                const file = input.files[0];
                                if (file) {
                                    const reader = new FileReader();
                                    reader.addEventListener('load', () => {
                                        previewImg.setAttribute('src', reader.result);
                                        placeholder.style.display = 'none';
                                        preview.style.display = 'block';
                                    });
                                    reader.readAsDataURL(file);
                                } else {
                                    previewImg.setAttribute('src', '');
                                    placeholder.style.display = 'block';
                                    preview.style.display = 'none';
                                }
                            });
                    </script>
                    @error('thumbnail')
                    <p class="text-danger mb-2">{{ $message }}</p>
                    @enderror
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
{{-- ! --}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <form class="flex items-center py-4" method="get" action="{{ route('mostrar_productos') }}">
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
            <input value="{{ $texto ?? null }}" type="search" name="textoproducto"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Buscar productos" list="buscar">
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
    {{-- OPCIONES DE BUSQUEDA DE PRODUCTOS --}}
    <datalist id="buscar">
        <option value="Activos">
        <option value="Inactivos">
        <option value="Oferta">
    </datalist>
    {{-- FIN OPCIONES DE BUSQUEDA DE PRODUCTOS --}}
    <div class="relative overflow-x-auto ">
        <table class="min-w-full text-center table-fixed md-fixed sm:px-6 lg:px-8">
            <thead class="tabla-productos border-b">
                <tr>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">#</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nombre</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Precio</th>
                    {{-- <th scope="col" class="text-sm font-medium text-white px-6 py-4">Cantidad</th> --}}
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Editar</th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">Estado</th>
                </tr>
            </thead class="border-b">
            @foreach ($products as $product)
            <tr class="bg-white border-b">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><a
                        href="{{ route('mostrar_producto', $product->id) }}">{{ $product->name }}</a></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">RD$
                    {{ number_format($product->price, 2) }}</td>
                    {{-- @if ($product->cantidad_disponible == 5)
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-yellow-500">
                        {{ $product->cantidad_disponible}}</td>
                    @elseif ($product->cantidad_disponible <= 2)
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-red-800">
                        {{ $product->cantidad_disponible}}</td>
                    @else
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $product->cantidad_disponible}}</td>
                    @endif --}}

                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    <button type="button" class="my-1 btn btn-sm bg-green-600 hover:bg-green-700 text-white"
                        data-bs-toggle="modal" data-bs-target="#editarproductomodal{{ $product->id }}">
                        Editar
                    </button></td>
                    {{-- !Modal de editar --}}
                    <div class="modal fade" id="editarproductomodal{{ $product->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar producto</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">X</button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('editar_producto', $product) }}" method="POST" role="form"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                        <input type="text" name="nombre_txt" class="form-control mb-2"
                                            value="{{ $product->name }}">
                                        @error('name')
                                        <p class="text-danger mb-2">{{ $message }}</p>
                                        @enderror

                                        <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                        <textarea cols="20" rows="5" name="descripcion_txt"
                                            class="form-control mb-2">{{ $product->description }}</textarea>
                                        @error('description')
                                        <p class="text-danger mb-2">{{ $message }}</p>
                                        @enderror

                                        <label class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                                        <input type="number" name="precio_txt" class="form-control mb-2"
                                            value="{{ $product->precio_oferta }}">
                                        @error('price')
                                        <p class="text-danger mb-2">{{ $message }}</p>
                                        @enderror
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                                        <select name="estado_txt" wire:model="status"
                                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            <option value="{{ $product->status }}">{{ $product->status }}
                                            </option>
                                            <option value="ACTIVO">ACTIVO</option>
                                            <option value="INACTIVO">INACTIVO</option>
                                            <option value="OFERTA">OFERTA</option>
                                        </select>
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Precio de
                                            oferta</label>
                                        <input type="text" name="precio_oferta_txt" wire:model="precio_oferta"
                                            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            value="{{ $product->precio_oferta }}">
                                        @error('precio_oferta')
                                        <p class="text-danger mb-2">{{ $message }}</p>
                                        @enderror
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Thumbnail</label>
                                        <input type="file" name="imagen" id="imagen-input-ed" class="form-control mb-2">
                                        <div class="thumbnail-preview-ed">
                                            <img src="{{ $product->thumbnail ? Storage::url($product->thumbnail) : '' }}"
                                                id="imagen-preview-img-ed" class="img-fluid mb-2" alt="">
                                            <span id="preview-placeholder-ed">Arrastra una imagen</span>
                                        </div>

                                        <script>
                                            const inputedit = document.getElementById('imagen-input-ed');
                                                    const previewedit = document.getElementById('imagen-preview-ed');
                                                    const previewImgedit = document.getElementById('imagen-preview-img-ed');
                                                    const placeholderedit = document.getElementById('preview-placeholder-ed');

                                                    inputedit.addEventListener('change', () => {
                                                        const fileedit = inputedit.files[0];
                                                        if (fileedit) {
                                                            const readeredit = new FileReader();
                                                            readeredit.addEventListener('load', () => {
                                                                previewImgedit.setAttribute('src', readeredit.result);
                                                                placeholderedit.style.display = 'none';
                                                                previewedit.style.display = 'block';
                                                            });
                                                            readeredit.readAsDataURL(fileedit);
                                                        } else {
                                                            previewImgedit.setAttribute('src',
                                                                '{{ $product->thumbnail ? Storage::url($product->thumbnail) : '' }}');
                                                            placeholderedit.style.display = 'block';
                                                            previewedit.style.display = 'none';
                                                        }
                                                    });
                                        </script>
                                        @error('thumbnail')
                                        <p class="text-danger mb-2">{{ $message }}</p>
                                        @enderror
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
                    {{-- !FIN MODAL --}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product->status }}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    {{ $products->links() }}
</div>
@endsection
