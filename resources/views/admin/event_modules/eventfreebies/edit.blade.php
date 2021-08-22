@extends('layouts.admin')

@section('title', 'Home')

@section('pagetitle')
<div class="col-sm-6">
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Edit Event</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('admin') }}">Home</a></li>
            <li><a href="{{ route('eventsList') }}">List of Events</a></li>
            <li><a href="{{ route('showEventFreebie',$eventfreebie->event) }}">Event Freebies</a></li>
            <li><span>Edit Freebie</span></li>
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
                <form action="{{ route('updateEventFreebie', $eventfreebie->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h4 class="header-title">Event: {{$eventfreebie->eventmain->title}}</h4>
                    <div class="form-row align-items-center">
                        <div class="col-lg-10 col-md-8 my-1">
                            <div class="form-group">
                                <input name="freebie" value="{{$eventfreebie->freebie}}" required class="form-control" type="text" id="freebie" placeholder="Freebie">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 my-1">
                            <div class="form-group">
                                <button class="btn btn-flat btn-outline-primary w-100" type="submit">Update Freebie</button>
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