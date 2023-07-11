@extends('layouts.app')

@section('content')
<form action="{{ route('paypal.payment') }}" method="get" id="payment-form">
    @csrf
    <div class="form-row">
        <div>
            <div class="container p-0">
                <div class="card px-4">
                    <p class="h8 py-3">Payment Details</p>
                    <div class="row gx-3">
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Email</p>
                                <input id="email-element" type="email" class="form-control mb-1" placeholder="janedoe@gmail.com" required name="email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Person Name</p>
                                <input class="form-control mb-3" type="text" placeholder="Name" value="Barry Allen">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Card Number</p>
                                <input class="form-control mb-3" type="text" placeholder="1234 5678 435678">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Expiry</p>
                                <input class="form-control mb-3" type="text" placeholder="MM/YYYY">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">CVV/CVC</p>
                                <input class="form-control mb-3 pt-2 " type="password" placeholder="***">
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn mt-2 btn-outline-primary" type="submit">Completar Orden<span class="fas fa-arrow-right"></span></button>
                        </div>
                        <br>
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
@endsection
