<script src="https://cdn.tailwindcss.com"></script>
<form action="{{ route('order.save', $cart, Auth::user()->id) }}" method="get" id="payment-form">
    @csrf
    <div class="form-row">
        <div>
            <div class="container p-0">
                <div class="card px-4 ">
                    <p class="h8 py-3">Detalles de Pedido</p>
                    <div class="row gx-3">
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Correo</p>
                                <input id="email-element" type="email" class="form-control mb-1" placeholder="janedoe@gmail.com" required name="email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Nombre</p>
                                <input class="form-control mb-3" type="text" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Teléfono</p>
                                <input class="form-control mb-3" type="tel" placeholder="8297993862" pattern="[0-9]{9}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="btn btn-primary mb-3" style="width: 100%">
                                <button class="ps-3" type="submit">Confirmar Pedidos</button>
                            </div>
                            <span class="ps-3 font-black text-blue-900">Le estaremos contactando para confimar su compra</span>
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

    {{-- <div class="text-right">
        <button class="btn mt-2 btn-outline-success" type="submit">PAGAR RD${{number_format($products->sum('price'),2)}} <span class="fas fa-arrow-right"></span></button>
    </div> --}}
</form>
