<x-guest-layout>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">

                <form method="POST" action="{{ route('login') }}" class="pt-3">
                    @csrf
                    <div class="login-form-head">
                        <h4>Hello! let's get started!</h4>
                        <p>Sign in to continue.</p>
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
                            <x-input type="email" class="form-control" name="email" :value="old('email')" required id="email" aria-describedby="emailHelp" placeholder="Enter email"/>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your
                                email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <x-input type="password" class="form-control" name="password" required autocomplete="current-password" id="password" placeholder="Password"/>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
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
