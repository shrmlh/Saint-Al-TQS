@extends('layouts.admin')

@section('title', 'Edit User')

@section('pagetitle')
<div class="col-sm-6">
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Edit User</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('admin') }}">Home</a></li>
            <li><a href="{{ route('registrar_user') }}">List of Users</a></li>
            <li><span>Edit User</span></li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="row" style="background-color: white;">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                @include('admin.parts.flash-message')
                <form action="{{ route('updateUserAdmin', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row align-items-center">
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="firstname" class="col-form-label">Firstname</label>
                                <input name="firstname" value="{{$user->firstname}}" required class="form-control" type="text" id="firstname">
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="middleInitial" class="col-form-label">Middle Initial</label>
                                <input name="middleInitial" value="{{$user->middleInitial}}" maxlength="1" class="form-control" type="text" id="middleInitial">
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="lastname" class="col-form-label">Lastname</label>
                                <input name="lastname" value="{{$user->lastname}}" required class="form-control" type="text" id="lastname">
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="contactno" class="col-form-label">Contact No.</label>
                                <input name="contactno" value="{{$user->contactno}}" maxlength="11" required class="form-control" type="text" id="contactno">
                            </div>
                        </div>
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="birthday" class="col-form-label">Birthday</label>
                                <input name="birthday" value="{{$user->birthday}}" required class="form-control" type="date" id="birthday">
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-12 my-1">
                            <div class="form-group">
                                <label for="address" class="col-form-label">Address</label>
                                <input name="address" value="{{$user->address}}" required class="form-control" type="text" id="address">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <input name="email" value="{{$user->email}}" required class="form-control" type="text" id="email">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Position</label> <br/>

                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="role1" name="customRadio2" class="custom-control-input" data-role-number="1" @if ($user->role == 1) checked @endif>
                            <label class="custom-control-label" for="role1">Registrar</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="role2" name="customRadio2" class="custom-control-input" data-role-number="2" @if ($user->role == 2) checked @endif>
                            <label class="custom-control-label" for="role2">Cashier</label>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var radioButtons = document.querySelectorAll('input[type="radio"]');
                                var roleNumberTextbox = document.getElementById('role');
                                
                                radioButtons.forEach(function (radioButton) {
                                    radioButton.addEventListener('change', function () {
                                        if (this.checked) {
                                            var roleNumber = this.getAttribute('data-role-number');
                                            // Isasalaysay ang role number sa text box
                                            roleNumberTextbox.value = roleNumber;
                                        }
                                    });
                                });
                            });
                        </script>
                        <input type="text" id="role" name="role" value="{{ $user->role }}" style="display: none" >
                        
                    </div>
                    
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="status" name="status" value="1" {{ $user->status ? 'checked' : '' }}>
                            <label class="custom-control-label" for="status">Active</label>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-flat btn-outline-primary w-100" type="submit">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customscript')
<script>
    $(document).ready(function() {
        var str = $('#middleInitial').val();
        $('#middleInitial').val(str.slice(0, -1));
    });
</script>
@endsection
