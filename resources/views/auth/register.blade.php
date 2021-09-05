<x-guest-layout>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">

                <form method="POST" action="{{ route('register') }}" class="pt-3 w-100">
                    @csrf
                    <div class="login-form-head">
                        <h4>New here?</h4>
                        <p>Signing up is easy. It only takes a few steps.</p>
                        <p>Already have an account?
                            <a class="text-white font-weight-bold" href="{{ route('login') }}">Login Here.</a>
                        </p>
                    </div>
                    <div class="login-form-body">

                    <div class="text-danger">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="pb-4" :errors="$errors" />
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <x-input type="text" class="form-control" id="firstname" name="firstname"
                                    :value="old('firstname')" required autofocus placeholder="Enter Firstname"/>
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="middleInitial">Middle Initial</label>
                                <x-input type="text" maxLength="1" class="form-control" id="middleInitial" name="middleInitial"
                                    :value="old('middleInitial')" placeholder="Enter Middle Initial"/>
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <x-input type="text" class="form-control" id="lastname" name="lastname"
                                    :value="old('lastname')" required placeholder="Enter Lastname"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="contactno">Contact No.</label>
                                <x-input type="text" class="form-control" maxLength="11" id="contactno" name="contactno"
                                    :value="old('contactno')" required placeholder="Enter Contact No."/>
                            </div>
                        </div>
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <x-input type="date" maxLength="1" class="form-control" id="birthday" name="birthday"
                                    :value="old('birthday')" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-12 my-1">
                            <div class="form-group">
                                <label for="address" class="col-form-label">Address</label>
                                <x-input name="address" required class="form-control" type="text" id="address" :value="old('address')"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="firstname">Club Name</label>
                                <x-input type="text" maxLength="30" class="form-control" id="clubname" name="clubname"
                                    :value="old('clubname')" placeholder="Enter Club Name (Leave Blank if None)"/>
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="plateno">Plate No.</label>
                                <x-input type="text" maxLength="30" class="form-control" id="plateno" name="plateno"
                                    :value="old('plateno')" required placeholder="Enter Plate No."/>
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="licenseno">License No.</label>
                                <x-input type="text" class="form-control" id="licenseno" name="licenseno"
                                    :value="old('licenseno')" maxLength="30" required placeholder="Enter License No."/>
                            </div>
                        </div>
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
                        <div class="form-row align-items-center">
                            <div class="col-sm-12 my-1">
                                <button class="btn btn-flat btn-outline-primary w-100" id="form_submit" type="submit">Register <i class="ti-arrow-right"></i></button>
                            </div>
                            <div class="col-sm-12 my-1">
                                <button class="btn btn-flat btn-outline-secondary w-100" type="button" data-toggle="modal" data-target="#registerModal" id="anothermember">Add Member <i class="ti-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="addmember">
                       
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="registerModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body" id="modalCustomForm">
                    <div class="form-row align-items-center">
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <x-input type="text" class="form-control" id="firstname" name="firstname"
                                    :value="old('firstname')" required autofocus placeholder="Enter Firstname"/>
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="middleInitial">Middle Initial</label>
                                <x-input type="text" maxLength="1" class="form-control" id="middleInitial" name="middleInitial"
                                    :value="old('middleInitial')" placeholder="Enter Middle Initial"/>
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <x-input type="text" class="form-control" id="lastname" name="lastname"
                                    :value="old('lastname')" required placeholder="Enter Lastname"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="contactno">Contact No.</label>
                                <x-input type="text" class="form-control" id="contactno" name="contactno"
                                    :value="old('contactno')" required placeholder="Enter Contact No."/>
                            </div>
                        </div>
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <x-input type="date" maxLength="1" class="form-control" id="birthday" name="birthday"
                                    :value="old('birthday')" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-12 my-1">
                            <div class="form-group">
                                <label for="address" class="col-form-label">Address</label>
                                <x-input name="address" required class="form-control" type="text" id="address" :value="old('address')"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="plateno">Plate No.</label>
                                <x-input type="text" maxLength="30" class="form-control" id="plateno" name="plateno"
                                    :value="old('plateno')" required placeholder="Enter Plate No."/>
                            </div>
                        </div>
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="licenseno">License No.</label>
                                <x-input type="text" class="form-control" id="licenseno" name="licenseno"
                                    :value="old('licenseno')" maxLength="30" required placeholder="Enter License No."/>
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-12 my-1">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <x-input type="email" class="form-control" name="email" :value="old('email')" required id="email" aria-describedby="emailHelp" placeholder="Enter email"/>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your
                                    email with anyone else.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saver" data-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div> --}}
    @section('customscript')
    <script type="text/javascript">
        $(document).ready(function() {
            var i = 0;
            $("#anothermember").click(function () {
                ++i;
                $("#addmember").append(
                    '<input type="text" id="test2'+i+'">'
                );
                $("#modalCustomForm").append(
                    '<input type="text" id="test1'+i+'">'
                );
            });

            $(document).ready(function(){
                $("#saver").click(function(){
                $('#test2'+i).val($('#test1'+i).val());
                });
            });

            $(document).on('click', '.remove-input-field', function () {
                $(this).parents('tr').remove();
            });
        });
        </script>
    @endsection
</x-guest-layout>
