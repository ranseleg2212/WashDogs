<div class="py-4 px-4">
    @if (session()->has('message'))
        <div class="alerta-index alert alert-success alert-dismissible fade show text-white" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close bg-red-900 text-white font-extrabold" data-bs-dismiss="alert"
                aria-label="Close">x</button>
        </div>
    @endif
    <form class="flex items-center py-4" method="get" action="{{ route('buscar_producto') }}">
        <label for="voice-search" class="sr-only">Buscar</label>
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
                placeholder="Busca en nuestros productos">
        </div>
        <button type="submit"
            class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>Buscar
        </button>
    </form>
    {{-- OFERTA --}}
    @if ($productsofcnt != 0)
        <div class="row border-gray-300 rounded-lg shadow p-2 my-2">
            <div class="flex flex-wrap justify-center">
                @foreach ($productsof as $productof)
                    <div class="w-full sm:w-1/2 md:w-1/4 p-2 col-sm-3">
                        <div
                            class="max-w-sm bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700">
                            <a href="{{ route('products.show', ['product' => $productof->slug]) }}">
                                <img class="rounded-t-lg" src="{{ Storage::url($productof->thumbnail) }}"alt="">
                            </a>
                            <div class="p-4">
                                <a href="{{ route('products.show', ['product' => $productof->slug]) }}">
                                    <h5
                                        class="mb-2 sm:text-sm md:text-1x2 font-bold tracking-tight text-gray-900 dark:text-black">
                                        {{ $productof->name }}</h5>
                                </a>
                                @if ($productof->status == 'OFERTA')
                                    <p class="mb-3 font-extrabold text-neutral-600">¡OFERTA!</p>
                                    <p class="mb-3 font-normal line-through text-red-800">
                                        RD${{ number_format($productof->price, 2) }}</p>
                                    <p class="mb-3 font-bold text-green-800">
                                        RD${{ number_format($productof->precio_oferta, 2) }}</p>
                                @else
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">RD$
                                        {{ number_format($productof->price, 2) }}</p>
                                @endif
                                <div class="d-flex justify-content-end">
                                    @guest
                                        @if (Route::has('login'))
                                            <p
                                                class="mb-3 font-normal text-red-700 dark:text-red-400 text-center hover:text-blue-900 hover:font-extrabold">
                                                <a href="{{ route('login') }}">Inicia sesion para poder comprar</a>
                                            </p>
                                        @endif
                                    @else
                                        <button id="agregar_carrito" id="liveToastBtn"
                                            class="datos-pedido text-white font-bold py-2 px-4 rounded w-full bg-"
                                            wire:click="addToCart('{{ $productof->id }}')"
                                            onclick="event.preventDefault();
                                        Swal.fire(
                                        'Hecho',
                                        'Producto Agregado',
                                        'success')">
                                            <center>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                                </svg>
                                            </center>
                                        </button>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
    @endif
    {{-- FIN OFERTA --}}
    <div id="productos">
        {{-- <div class="row"> --}}
        <div class="flex flex-wrap justify-center items-stretch">
            @foreach ($products as $product)
                <div class="w-full sm:w-1/2 md:w-1/4 p-2 col-sm-3">
                    <div
                        class="max-w-sm bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700 hover:border-slate-800">
                        <a href="{{ route('products.show', ['product' => $product->slug]) }}">
                            <img class="rounded-t-lg" src="{{ Storage::url($product->thumbnail) }}"alt="">
                        </a>
                        <div class="p-5">
                            <a href="{{ route('products.show', ['product' => $product->slug]) }}">
                                <h5 class="mb-2 text-1x2 font-bold tracking-tight text-gray-900 dark:text-black">
                                    {{ $product->name }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">RD$
                                {{ number_format($product->price, 2) }}</p>
                            <div class="d-flex justify-content-end">
                                @guest
                                    @if (Route::has('login'))
                                        <p
                                            class="mb-3 font-normal text-center text-neutral-400 hover:font-bold">
                                            <a href="{{ route('login') }}">Inicia sesion para poder comprar</a>
                                        </p>
                                    @endif
                                @else
                                    <button id="agregar_carrito"
                                        class="datos-pedido-light text-white font-bold py-2 px-4 rounded boton_cien w-full"
                                        wire:click="addToCart('{{ $product->id }}')"
                                        onclick="event.preventDefault();
                                        Swal.fire(
                                        'Hecho',
                                        'Producto Agregado',
                                        'success')">
                                        <center>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                            </svg>
                                        </center>
                                        <x-icon name="plus-sm" class="w-1 h-1" />
                                    </button>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- </div> --}}
        {{ $products->links() }}
    </div>
</div>

{{-- @endsection --}}
@push('scripts')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush
