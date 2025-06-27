<div>
    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2 class="mb-4">Checkout Product</h2>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>

    <div>
        <div class="container py-5" style="margin-top: 20px; margin-bottom:20px;">
            <div class="row g-5">

                {{-- Billing Information --}}
                <div class="col-md-7" >
                    <div class="card shadow-sm rounded">
                        <div class="card-header text-white">
                            <h2 class="mb-0">Billing Details</h2>
                        </div>
                        <div class="card-body" style="margin-top: 20px; margin-bottom:20px;">
                            <form wire:submit.prevent="placeOrder">

                                <div class="mb-3" style="margin-top: 10px">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" wire:model.lazy="full_name"
                                        class="form-control @error('full_name') is-invalid @enderror"
                                        placeholder="John Doe">
                                    @error('full_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3" style="margin-top: 10px">
                                    <label class="form-label">Email</label>
                                    <input type="email" wire:model.lazy="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="email@example.com">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3" style="margin-top: 10px">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" wire:model.lazy="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        placeholder="03xx-xxxxxxx">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3" style="margin-top: 10px">
                                    <label class="form-label">Shipping Address</label>
                                    <textarea wire:model.lazy="address" rows="3" class="form-control @error('address') is-invalid @enderror"
                                        placeholder="Street, City, Zip"></textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" style="margin-top: 10px" class="btn btn-success w-100 mt-3">Place Order</button>

                            </form>
                        </div>
                    </div>
                </div>

                {{-- Order Summary --}}
                <div class="col-md-5">
                    <div class="card shadow-sm rounded">
                        <div class="card-header bg-dark text-white">
                            <h2 class="mb-0">Order Summary</h2>
                        </div>
                        <div class="card-body">


                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <img style="width: 100px" src="{{ $product->image }}" alt="">
                                    <br><br>
                                    <strong>{{ $product['name'] }}</strong>
                                    <div class="text-muted">{{$product->price}}x{{ $qty }}</div>
                                </div>
                                <div>Rs {{ number_format($product['price'] * $qty) }}</div>
                            </div>
                            <hr>

                            <div class="d-flex justify-content-between mt-3">
                                <strong>Total</strong>
                                {{-- <strong>Rs {{ number_format($totalAmount) }}</strong> --}}
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
