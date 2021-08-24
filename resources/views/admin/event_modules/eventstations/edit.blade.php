@extends('layouts.admin')

@section('title', 'Home')

@section('pagetitle')
<div class="col-sm-6">
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Edit Event</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('admin') }}">Home</a></li>
            <li><a href="{{ route('eventsList') }}">List of Events</a></li>
            <li><a href="{{ route('showEventStation',$eventstation->event) }}">Event Stations</a></li>
            <li><span>Edit Station</span></li>
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
                <form action="{{ route('updateEventStation', $eventstation->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h4 class="header-title">Event: {{$eventstation->eventmain->title}}</h4>
                    <div class="form-row align-items-center">
                        <div class="col-lg-10 col-md-8 my-1">
                            <div class="form-group">
                                <input name="station" value="{{$eventstation->station}}" required class="form-control" type="text" id="station" placeholder="Station">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 my-1">
                            <div class="form-group">
                                <button class="btn btn-flat btn-outline-primary w-100" type="submit">Update Station</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customscript')

@endsection