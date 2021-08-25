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
                                <input name="middleInitial" value="{{$user->middleInitial}}" maxlength="1" required class="form-control" type="text" id="middleInitial">
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <div class="form-group">
                                <label for="lastname" class="col-form-label">Lastname</label>
                                <input name="lastname" value="{{$user->lastname}}" required class="form-control" type="text" id="lastname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <input name="email" value="{{$user->email}}" required class="form-control" type="text" id="email">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="status" name="status" value="1" {{ $user->status ? 'checked' : '' }}>
                            <label class="custom-control-label" for="status">Status</label>
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