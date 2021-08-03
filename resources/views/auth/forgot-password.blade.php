<x-guest-layout>


    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <a href="/">
                                    <img src="{{asset('/assets/images/logo.svg')}}">
                                </a>
                            </div>
                            <h4>Forgot your password? No problem.</h4>
                            <h6 class="font-weight-light">Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</h6>

                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="pt-2" :errors="$errors" />

                            <form method="POST" action="{{ route('password.email') }}" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <x-input type="email" name="email" :value="old('email')" required autofocus
                                        class="form-control form-control-lg" id="email"
                                        placeholder="Email"/>
                                </div>
                                <div class="mt-3">
                                    <button
                                        class="btn btn-block btn-gradient-primary btn-sm font-weight-medium auth-form-btn">
                                        {{ __('Email Password Reset Link') }}</button>
                                </div>
                                <div class="text-center mt-3 font-weight-light">
                                    Don't have an account?
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="text-primary">Register!</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
