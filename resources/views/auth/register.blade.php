<x-guest-layout>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">

                <form method="POST" action="{{ route('register') }}" class="pt-3">
                    @csrf
                    <div class="login-form-head">
                        <h4>New here?</h4>
                        <p>Signing up is easy. It only takes a few steps.</p>
                    </div>
                    <div class="login-form-body">

                    <div class="text-danger">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="pb-4" :errors="$errors" />
                    </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <x-input type="text" class="form-control" id="name" name="name"
                                :value="old('name')" required autofocus placeholder="Enter Name"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <x-input type="email" class="form-control" name="email" :value="old('email')" required id="email" aria-describedby="emailHelp" placeholder="Enter email"/>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your
                                email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <x-input type="password" class="form-control" name="password" id="password" 
                                required autocomplete="new-password" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <x-input type="password" class="form-control" name="password_confirmation" id="password_confirmation" 
                                required autocomplete="new-password" placeholder="Confirm Password"/>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Register <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-2">
                            <p class="text-muted">Already have an account?
                                <a href="{{ route('login') }}">Login</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
