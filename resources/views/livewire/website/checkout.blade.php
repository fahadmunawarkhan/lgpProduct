<div>

    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2 class="mb-4">Checkout</h2>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>

    <style>
        .form-control:focus {
            box-shadow: none;
            border-color: #4e73df;
        }

        .order-summary {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 0.5rem;
        }
    </style>




    <div class="container py-5">
        <h2 class="mb-4">Checkout</h2>
        <div class="row">

            <!-- Billing Details -->
            <div class="col-md-7">
                <h5 class="mb-3">Billing Details</h5>
                <form>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullname" placeholder="John Doe">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="123 Main St">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="zip" class="form-label">ZIP Code</label>
                            <input type="text" class="form-control" id="zip">
                        </div>
                    </div>

                    <h5 class="mt-4">Payment</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="credit" checked>
                        <label class="form-check-label" for="credit">Credit Card</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="paypal">
                        <label class="form-check-label" for="paypal">PayPal</label>
                    </div>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="col-md-5">
                <div class="order-summary shadow-sm">
                    <h5 class="mb-3">Your Order</h5>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <h6 class="my-0">Product Name</h6>
                                <small class="text-muted">Qty: 1</small>
                            </div>
                            <span class="text-muted">$25.00</span>
                        </li>
                        <!-- Add more items as needed -->
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total</span>
                            <strong>$25.00</strong>
                        </li>
                    </ul>
                    <button class="btn btn-primary w-100">Place Order</button>
                </div>
            </div>

        </div>
    </div>
    {{-- Success is as dangerous as failure. --}}
</div>
