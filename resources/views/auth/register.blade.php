<x-guest-layout>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <a href="/">
                                    <img src="{{ asset('assets/images/logo.svg') }}">
                                </a>
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="pt-2" :errors="$errors" />

                            <form class="pt-3" method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <x-input type="text" class="form-control form-control-lg" id="name" name="name"
                                        :value="old('name')" required autofocus placeholder="Name"/>
                                </div>
                                <div class="form-group">
                                    <x-input type="email" class="form-control form-control-lg" id="email" name="email"
                                        :value="old('email')" required placeholder="Email"/>
                                </div>
                                <div class="form-group">
                                    <x-input type="password" class="form-control form-control-lg" id="password"
                                        name="password" required autocomplete="new-password" placeholder="Password"/>
                                </div>
                                <div class="form-group">
                                    <x-input type="password" class="form-control form-control-lg"
                                        id="password_confirmation" name="password_confirmation" required
                                        placeholder="Confirm Password"/>
                                </div>
                                <div class="mt-3">
                                    <button
                                        class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">{{ __('Register') }}</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Already have an account? <a
                                        href="{{ route('login') }}" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</x-guest-layout>
