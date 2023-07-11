<form action="{{ route('paypal.payment') }}" method="get" id="payment-form">
    @csrf
    <div class="form-row">
        <div>
            <input id="email-element" type="email" class="form-control mb-1" placeholder="janedoe@gmail.com" required name="email">
        </div>

        <div id="card-element" require>
            <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>

    <div class="text-right">
        <button class="btn mt-2 btn-outline-primary" type="submit">Submit Payment</button>
    </div>
</form>
