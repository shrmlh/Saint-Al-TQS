@extends('layouts.rider')

@section('title', 'Home')

@section('pagetitle')
<div class="col-sm-6">
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Dashboard</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('dashboard') }}">Home</a></li>
            <li><span>Dashboard</span></li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="alert-items">
                    <div class="alert alert-success" role="alert">
                        <strong>Well done!</strong> You successfully read this important alert message.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection