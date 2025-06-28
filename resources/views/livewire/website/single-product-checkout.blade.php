<div>
    <style>
        .invalid-feedback {
            color: red;
        }

        .col-md-6.mb-3 {
            margin-top: 12px;
        }
    </style>
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

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (Auth::check())
                    @if (auth()->user())
                        <div class="col-md-7">
                            <div class="card shadow-sm rounded">
                                <div class="card-header text-white">
                                    <h2 class="mb-0">Billing Details</h2>
                                </div>
                                <div class="card-body" style="margin-top: 20px; margin-bottom:20px;">
                                    <form wire:submit.prevent="placeOrder">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" wire:model.lazy="full_name"
                                                    class="form-control @error('full_name') is-invalid @enderror"
                                                    placeholder="John Doe">
                                                @error('full_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" wire:model.lazy="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="email@example.com">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Phone Number</label>
                                                <input type="text" wire:model.lazy="phone"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    placeholder="03xx-xxxxxxx">
                                                @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Delivery Date</label>
                                                <input type="date" wire:model.lazy="date"
                                                    class="form-control @error('date') is-invalid @enderror">
                                                @error('date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="paymenttype" class="form-label">Payment Type</label>
                                                <select wire:model.lazy="paymenttype" id="paymenttype"
                                                    class="form-control @error('paymenttype') is-invalid @enderror">
                                                    <option value="">Please select</option>
                                                    <option value="online">Online</option>
                                                    <option value="cod">Cash on Delivery</option>
                                                </select>
                                                @error('paymenttype')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="mb-3" style="margin-top: 12px;">
                                            <label class="form-label">Shipping Address</label>
                                            <textarea wire:model.lazy="address" rows="3" class="form-control @error('address') is-invalid @enderror"
                                                placeholder="Street, City, Zip"></textarea>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Notes section as a full-width field -->
                                        <div class="mb-3" style="margin-top: 12px;">
                                            <label class="form-label">Notes</label>
                                            <textarea wire:model.lazy="note" rows="3" class="form-control @error('note') is-invalid @enderror"
                                                placeholder="Notes"></textarea>
                                            @error('note')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-success w-100 mt-3" style="margin-top:10px;">Place Order</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="col-md-5">
                        <div class="card shadow-sm rounded">
                            <div class="card-body" style="margin-top: 20px">
                                <button wire:click="Login()" class="btn btn-primary">Login</button>
                                <button wire:click="Register()" class="btn btn-primary">Register</button>
                                @if ($login)
                                    @livewire('website.auth.login-page')
                                @else
                                    @livewire('website.auth.register-page')
                                @endif
                            </div>
                        </div>
                    </div>
                @endif


                {{-- Billing Information --}}


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
                                    <div class="text-muted">{{ $product->price }}x{{ $qty }}</div>
                                </div>
                                <div>Rs {{ number_format($product['price'] * $qty) }}</div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mt-3">
                                <strong>Total</strong>
                                {{ number_format($product['price'] * $qty) }}
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
