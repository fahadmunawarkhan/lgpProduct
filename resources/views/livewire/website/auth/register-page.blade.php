<div>
    <style>
        .login-box {
            max-width: 600px;
            width: 100%;
            padding: 2rem;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
    </style>

    <div class="login-box mt-5 mb-5">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h2 class="text-center mb-4">Customer Registration</h2>

        <form wire:submit.prevent="register">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Name</label>
                    <input wire:model.defer="form.name" type="text" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input wire:model.defer="form.email" type="email" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Password</label>
                    <input wire:model.defer="form.password" type="password" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Phone Number</label>
                    <input wire:model.defer="form.phone_number" type="text" class="form-control">
                </div>
                <div class="col-md-12 mb-3" style="margin-top: 10px">
                    <label>CNIC</label>
                    <input wire:model.defer="form.cnic" type="text" class="form-control">
                </div>
                <div class="col-md-12 mb-3"  style="margin-top: 10px">
                    <label>Address Line 1</label>
                    <input wire:model.defer="form.address_line_1" type="text" class="form-control">
                </div>
                <div class="col-md-12 mb-3"  style="margin-top: 10px">
                    <label>Address Line 2</label>
                    <input wire:model.defer="form.address_line_2" type="text" class="form-control">
                </div>
                <div class="col-md-4 mb-3"  style="margin-top: 10px">
                    <label>City</label>
                    <input wire:model.defer="form.city" type="text" class="form-control">
                </div>
                <div class="col-md-4 mb-3"  style="margin-top: 10px">
                    <label>Province</label>
                    <input wire:model.defer="form.province" type="text" class="form-control">
                </div>
                <div class="col-md-4 mb-3"  style="margin-top: 10px">
                    <label>Postal Code</label>
                    <input wire:model.defer="form.postal_code" type="text" class="form-control">
                </div>
            </div>

            <div class="d-grid mt-3"  style="margin-top: 10px">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

            <div class="mt-3 text-center">
                <small>Already have an account? <a href="{{ route('user.login') }}">Login</a></small>
            </div>
        </form>
    </div>
</div>
