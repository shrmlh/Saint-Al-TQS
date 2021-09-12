<x-guest-layout>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">

                <form id="addmembers" name="addmembers" class="pt-3 w-100">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="login-form-head">
                        <h4>New here?</h4>
                        <p>Signing up is easy. It only takes a few steps.</p>
                        <p>Already have an account?
                            <a class="text-white font-weight-bold" href="{{ route('login') }}">Login Here.</a>
                        </p>
                    </div>
                    <div class="login-form-body">
                    
                    <div class="alert-dismiss alert-msg" style="display:none">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong class="success-msg"></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
                            </button>
                        </div>
                    </div>

                    <div class="text-danger">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="pb-4" :errors="$errors" />
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <x-input type="text" class="form-control" id="firstname" name="addMoreInputFields[0][firstname]"
                                    :value="old('firstname')" required autofocus placeholder="Enter Firstname"/>
                                <span class="text-danger error-text addMoreInputFields0firstname_err">&nbsp;</span>
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="middleInitial">Middle Initial</label>
                                <x-input type="text" maxLength="1" class="form-control" id="middleInitial" name="addMoreInputFields[0][middleInitial]"
                                    :value="old('middleInitial')" placeholder="Enter Middle Initial"/>
                                <span class="text-danger error-text addMoreInputFields0middleInitial_err">&nbsp;</span>
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <x-input type="text" class="form-control" id="lastname" name="addMoreInputFields[0][lastname]"
                                    :value="old('lastname')" required placeholder="Enter Lastname"/>
                                <span class="text-danger error-text addMoreInputFields0lastname_err">&nbsp;</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="contactno">Contact No.</label>
                                <x-input type="text" class="form-control" maxLength="11" id="contactno" name="addMoreInputFields[0][contactno]"
                                    :value="old('contactno')" required placeholder="Enter Contact No."/>
                                <span class="text-danger error-text addMoreInputFields0contactno_err">&nbsp;</span>
                            </div>
                        </div>
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <x-input type="date" class="form-control" id="birthday" name="addMoreInputFields[0][birthday]"
                                    :value="old('birthday')" required/>
                                <span class="text-danger error-text addMoreInputFields0birthday_err">&nbsp;</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-12 my-1">
                            <div class="form-group">
                                <label for="address" class="col-form-label">Address</label>
                                <x-input name="addMoreInputFields[0][address]" required class="form-control" type="text" id="address" placeholder="Enter Address" :value="old('address')"/>
                                <span class="text-danger error-text addMoreInputFields0address_err">&nbsp;</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="firstname">Club Name</label>
                                <x-input type="text" maxLength="30" class="form-control" id="clubname" name="clubname"
                                    :value="old('clubname')" placeholder="Enter Club Name (Leave Blank if None)"/>
                                <span class="text-danger error-text clubname_err">&nbsp;</span>
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="plateno">Plate No.</label>
                                <x-input type="text" maxLength="30" class="form-control" id="plateno" name="addMoreInputFields[0][plateno]"
                                    :value="old('plateno')" required placeholder="Enter Plate No."/>
                                <span class="text-danger error-text addMoreInputFields0plateno_err">&nbsp;</span>
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="licenseno">License No.</label>
                                <x-input type="text" class="form-control" id="licenseno" name="addMoreInputFields[0][licenseno]"
                                    :value="old('licenseno')" maxLength="30" required placeholder="Enter License No."/>
                                <span class="text-danger error-text addMoreInputFields0licenseno_err">&nbsp;</span>
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <x-input type="email" class="form-control" name="addMoreInputFields[0][email]" :value="old('email')" required id="email" aria-describedby="emailHelp" placeholder="Enter email"/>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your
                                email with anyone else.</small>
                            <span class="text-danger error-text addMoreInputFields0email_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <x-input type="password" class="form-control" name="addMoreInputFields[0][password]" id="password" 
                                required autocomplete="new-password" placeholder="Password"/>
                            <span class="text-danger error-text addMoreInputFields0password_err"></span>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <x-input type="password" class="form-control" name="addMoreInputFields[0][password_confirmation]" id="password_confirmation" 
                                required autocomplete="new-password" placeholder="Confirm Password"/>
                            <span class="text-danger error-text addMoreInputFields0password_confirmation_err"></span>
                        </div>
                        <div id="addmember">

                        </div>
                        <div class="form-row align-items-center">
                            <div class="col-sm-12 my-1">
                                <button class="btn btn-flat btn-outline-primary w-100" id="form_submit" type="button">Register <i class="ti-arrow-right"></i></button>
                            </div>
                            <div class="col-sm-12 my-1">
                                <button class="btn btn-flat btn-outline-secondary w-100" type="button" data-toggle="modal" data-target="#registerModal" id="anothermember">Add Member <i class="ti-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('customscript')
    <script src="{{asset('/js/registrationmode.js')}}"></script>
    <script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $('#form_submit').click(function(){ 
                $.ajax({  
                        url:"{{ route('register.store') }}",  
                        method:"POST",  
                        data:$('#addmembers').serialize(),
                        type:'json',
                        success:function(data)  
                        {
                            if(data.error){
                                console.log(data.error);
                                $('.error-text').html("&nbsp;");
                                printErrorMsg(data.error);
                            }else{
                                $("#addmembers")[0].reset();
                                $('div#member').remove();
                                $('.alert-msg').css('display','block');
                                $('.success-msg').text(data.success);
                                window.scrollTo(0, 0);
                            }
                        } , 
                });  
            });  

            function printErrorMsg (msg) {
                $.each( msg, function( key, value ) {
                    $('.'+key.replaceAll(".","")+'_err').text(value.join(' '));
                });
            }
    });
    </script>
    @endsection
</x-guest-layout>
