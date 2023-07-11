<div>
    <div class="container">
        <h2 class="text-center mb-4 mt-3 text-orange-800 font-extrabold" style="font-size: 24px" id="titulo-seccion">
            Carrito de compras</h2>

        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show bg-red-500 text-white font-extrabold" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row">
            <div class="col-sm-7">
                <div
                    class="card bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700">
                    <div class="card-body">
                        <table class="table text-center table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Servicio</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Mascota</th>
                                    <th scope="col">Borrar</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($cartItems as $product)
                                <tr>
                                    <td>
                                        {{ $product->id }}
                                    </td>
                                    <td>
                                        <a id="productocarrito"
                                            class="hover:text-blue-400 hover:font-bold text-gray-600  text-base"
                                            href="{{ route('products.show', ['product' => $product->slug]) }}">
                                            {{ $product->name }}</a>
                                    </td>
                                    <td>
                                        @if($product->status == 'OFERTA')
                                        <p id="productocarrito">RD$ {{ number_format($product->precio_oferta, 2) }}</p>
                                        @else
                                        <p id="productocarrito">RD$ {{ number_format($product->price, 2) }}</p>
                                        @endif
                                    </td>
                                    <td>
                                        <p id="productocarrito">RD$ {{ $mascota->mascota_id ?? null }}</p>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger"
                                            wire:click="deleteProduct('{{ $product->pivot->id }}')"
                                            onclick="">Eliminar</button>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td class="fw-bold">Total:</td>
                                    {{-- <td class="fw-bold">RD${{number_format($products->sum('price'),2)}}</td> --}}
                                    <td class="fw-bold">RD$ {{number_format($total,2)}}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div
                    class="card bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700 place-content-center content-center items-center">
                    <img src="{{ asset('logop.ico') }}" alt="" style="width: 100px"
                        class="max-w-full h-auto rounded-lg">
                    <h3 class="txt-carrito text-lg text-center font-extrabold">Gracias por realizar su compra</h3>
                </div>
            </div>
            <div class="col-sm-5">
                <div
                    class="card bg-neutral-900 border border-gray-200 rounded-lg shadow dark:bg-white dark:border-gray-700">
                    <div class="card-body">
                        <form action="{{ route('order.save', [$cart, Auth::user()->id, $total]) }}" method="post"
                            id="payment-form">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <div>
                                    <div class="container p-0">
                                        <div class="card px-4 ">
                                            <p class="h8 py-3">Detalles de Pedido</p>
                                            <div class="row gx-3">
                                                <div class="col-12">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">Correo</p>
                                                        <input id="email-element" type="email" class="form-control mb-1"
                                                            placeholder="janedoe@gmail.com" required name="email" value="{{Auth::user()->email}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">Nombre</p>
                                                        <input class="form-control mb-3" type="text" placeholder="Pedro"
                                                            name="name" value="{{Auth::user()->name}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">Teléfono</p>
                                                        <input class="form-control mb-3" type="tel"
                                                            placeholder="8297993862" pattern="[0-9]{10}" name="tel" value="{{Auth::user()->telefono}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">Fecha tentativa</p>
                                                        <input type="datetime-local" name="fecha_preferencia" id="fecha_preferencia" class="form-control mb-3">
                                                        <script>
                                                            // Obtener la referencia al elemento de entrada
                                                            var fechaHoraInput = document.getElementById("fecha_preferencia");

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
                                                <div class="col-12">
                                                    <div class="d-flex flex-column">
                                                        <p class="text mb-1">Nombre</p>
                                                       <select class="form-control mb-3" name="mascota" id="mascota">
                                                        <option value="">Selecciona una mascota</option>
                                                        @foreach ($mascotas as $mascota)
                                                            <option value="{{$mascota->mascota_id}}">{{$mascota->nombre}}</option>
                                                        @endforeach
                                                       </select>
                                                    </div>
                                                </div>
                                                <button type="submit"
                                                    class="col-12 btn mt-3 mb-3 bg-blue-800 text-white hover:bg-blue-900"
                                                    style="width: 100%">
                                                    Confirmar
                                                </button>
                                                <span class="text-neutral-900 text-base ps-3 font-bold text-center">Le estaremos contactando para confirmar</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="card-element" require>
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@push('scripts')
<script src="https://cdn.tailwindcss.com"></script>
@endpush
{{-- @push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    var stripe = Stripe("{{ $stripeKey }}");

        var elements = stripe.elements();

        var card = elements.create('card', {
            hidePostalCode: true,
            style: {
                base: {
                    iconColor: '#666EE8',
                    color: '#31325F',
                    lineHeight: '40px',
                    fontWeight: 300,
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSize: '15px',
                    '::placeholder': {
                        color: '#CFD7E0',
                    },
                },
            }
        });

        card.mount('#card-element');

        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
</script>
@endpush --}}
