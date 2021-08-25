@extends('layouts.admin')

@section('title', 'Users')

@section('pagetitle')
<div class="col-sm-6">
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Users</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('admin') }}">Home</a></li>
            <li><span>List of Users</span></li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <!-- Progress Table start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                
                @include('admin.parts.flash-message')
                
                
                <div class="row align-items-center">
                   
                    <div class="col-sm-12 clearfix">
                        <div class="pull-left">
                            <h4 class="header-title">List of Users</h4>
                            </div>
                        <div class="pull-right">
                            <a class="btn btn-flat btn-outline-primary mb-3" href="{{ route('createUserAdmin') }}"><i class="fa fa-calendar-plus-o"></i> Create New User</a>
                        </div>
                    </div>
                   
                </div>
               
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Date Updated</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row" class="th-header">{{ $user->lastname }}, {{ $user->firstname }} {{ $user->middleInitial }}</th>
                                    <td>{{ $user->email }}</td>
                                    
                                    @if($user->status==1) 
                                    <td class="text-success">
                                    @else
                                    <td class="text-danger">
                                    @endif
                                        {{ $user->status ? 'Active' : 'Deactivated' }}
                                    </td>

                                    <td>{!! date('M-d-Y | h:i a', strtotime($user -> created_at)) !!}</td>
                                    <td>{!! date('M-d-Y | h:i a', strtotime($user -> updated_at)) !!}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3"><a href="{{ route('editUserAdmin',$user->id) }}" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                            <li>
                                                <form action="{{ route('deleteUserAdmin',$user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-danger" style="outline: none;border:none"><i class="ti-trash"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Progress Table end -->
</div>
@endsection