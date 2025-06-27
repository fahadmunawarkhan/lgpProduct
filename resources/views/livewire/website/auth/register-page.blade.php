<div>
    <section class="page-title">
        <div class="container">
            <h2 class="mb-4">Customer Register</h2>
        </div>
    </section>
    <style>
        .login-box {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
    </style>



    <div class="login-box" style="margin-top: 50px; margin-bottom:50px;">
        <h2 class="text-center mb-4">Register Form</h2>
        <form style="">
            <div class="mb-3" style="margin-top: 20px;">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" required />
            </div>
            <div class="mb-3" style="margin-top: 20px">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" required />
            </div>
            <div class="d-grid mb-3" style="margin-top: 20px;text-align: center;">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <div class="text-center">
                <small><a href="#">Forgot password?</a></small>
            </div>
        </form>
    </div>
    {{-- Success is as dangerous as failure. --}}
</div>
