<x-guest-layout>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">

                <form method="POST" action="{{ route('password.email') }}" class="pt-3">
                    @csrf
                    <div class="login-form-head">
                        <h4>Forgot your password? No problem.</h4>
                        <p>Just let us know your email address and we will email you a password reset link.</p>
                    </div>
                    <div class="login-form-body">
                    <!-- Session Status -->
                    <div class="text-danger">
                        <x-auth-session-status class="pt-1" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="pb-4" :errors="$errors" />
                    </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <x-input type="email" class="form-control" name="email" :value="old('email')" required id="email" autofocus aria-describedby="emailHelp" placeholder="Enter email"/>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your
                                email with anyone else.</small>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Email Password Reset Link <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-2">
                            <p class="text-muted">Don't have an account? 
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register!</a>
                                @endif
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
