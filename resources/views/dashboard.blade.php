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
                    
                    <div class="alert alert-warning" role="alert">
                        @if (!Auth::user()->is_member)
                            Your are not yet an official member of CR1M. 
                            <a href="" class="text-warning"><strong>Verify here.</strong></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection