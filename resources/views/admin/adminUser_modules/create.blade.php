@extends('layouts.admin')

@section('title', 'Create Event')

@section('pagetitle')
<div class="col-sm-6">
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Create User</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('admin') }}">Home</a></li>
            <li><span>Create User</span></li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                @include('admin.parts.flash-message')
                <form action="{{ route('storeAdminUser') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="firstname" class="col-form-label">Firstname</label>
                                <x-input name="firstname" required class="form-control" type="text" id="firstname" :value="old('firstname')"/>
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="middleInitial" class="col-form-label">Middle Initial</label>
                                <x-input name="middleInitial" maxlength="1" class="form-control" type="text" id="middleInitial" :value="old('middleInitial')"/>
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="lastname" class="col-form-label">Lastname</label>
                                <x-input name="lastname" required class="form-control" type="text" id="lastname" :value="old('lastname')"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <x-input name="email" required class="form-control" type="text" id="email" :value="old('email')"/>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="password" class="col-form-label">Password</label>
                                <input name="password" required class="form-control" type="password" id="password">
                            </div>
                        </div>
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="password_confirmation" class="col-form-label">Confirm Password</label>
                                <input name="password_confirmation" required class="form-control" type="password" id="password_confirmation">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-flat btn-outline-primary w-100" type="submit">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection