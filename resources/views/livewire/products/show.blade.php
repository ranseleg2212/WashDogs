
<div>
    <div class="container">
        @if(session()->has('Mensaje'))
        <div class="alert alert-success alert-dismissible fade show bg-lime-200 text-black" role="alert">
            {{ session('Mensaje') }}
            <button type="button" class="btn-close text-black" data-bs-dismiss="alert" aria-label="Close" ></button>
        </div>
    @endif
        <div class="row mt-4">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ Storage::url($product->thumbnail) }}" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700">
                    <div class="card-body">
                        <h1 class="font-extrabold tracking-tight text-gray-900 dark:text-dark" style="font-size: 24px">{{ $product->name }}</h1>
                            {{-- CASO DE OFERTA --}}
                            @if ($product->status=='OFERTA')
                            <p class="mb-3 font-extrabold text-neutral-600 text-xl">¡OFERTA!</p>
                            <p class="mb-3 font-normal line-through text-red-800">
                                RD${{ number_format($product->price, 2) }}</p>
                            <p class="mb-3 font-bold text-green-800">
                                RD${{ number_format($product->precio_oferta, 2) }}</p>
                            @else
                            <h2 class="mt-3 font-normal text-gray-700 dark:text-gray-600 text-lg">RD$ {{number_format($product->price,2)}}</h2>
                            @endif
                            {{-- FIN CASO DE OFERTA --}}
                        <p class="mt-4 mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>
                        <div class="text-end">
                            @if (Auth::check())
                            <button id="agregar_carrito" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded boton_cien" wire:click="addToCart('{{ $product->slug }}')">Agregar al carrito <x-icon name="plus-sm" class="w-1 h-1"/></button>
                            @else
                            <p class="mb-3 font-normal text-red-700 dark:text-red-400 text-center hover:text-blue-900 hover:font-extrabold"><a href="{{ route('login') }}">Inicia sesion para poder comprar</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdn.tailwindcss.com"></script>
@endpush
