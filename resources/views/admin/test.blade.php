@extends('layouts.admin')

@section('title', 'Home')

@section('content')
    <div class="header">
        <h1 class="page-header">
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}">Home</a></li>
            <li><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="active">Data</li>
        </ol>

    </div>
    <div id="page-inner">
        <footer>
            <p>All right reserved 20211.</p>
        </footer>
    </div>
    <!-- /. PAGE INNER  -->
@endsection