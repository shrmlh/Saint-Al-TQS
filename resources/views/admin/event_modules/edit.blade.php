@extends('layouts.admin')

@section('title', 'Edit Event')

@section('pagetitle')
<div class="col-sm-6">
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Edit Event</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('admin') }}">Home</a></li>
            <li><span>Edit Event</span></li>
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
                <form action="{{ route('updateEvent', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container w-50">
                        <div class="card-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card card-bordered">
                                        <img class="card-img-top img-fluid" src="@if(file_exists(public_path('appimages/events/'.$event->route_map))){{asset('appimages/events/'.$event->route_map)}}@else{{asset('appimages/noimage.png')}}@endif" alt="route image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Title</label>
                        <input name="title" required class="form-control" value="{{$event->title}}" type="text" id="title">
                    </div>
                    <div class="form-group">
                        <label for="theme" class="col-form-label">Theme</label>
                        <input name="theme" required class="form-control" value="{{$event->theme}}" type="text" id="theme">
                    </div>
                    <div class="form-group">
                        <label for="regstart" class="col-form-label">Start of Registration</label>
                        <input name="reg_start" required class="form-control" type="datetime-local" value="{!! date('Y-m-d\TH:i', strtotime($event -> reg_start)) !!}" id="regstart">
                    </div>
                    
                    <div class="form-row align-items-center">
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="eventstart" class="col-form-label">Start Date</label>
                                <input name="event_start" required class="form-control" type="datetime-local" value="{!! date('Y-m-d\TH:i', strtotime($event -> event_start)) !!}" id="eventstart">
                            </div>
                        </div>
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="eventend" class="col-form-label">End Date</label>
                                <input name="event_end" required class="form-control" type="datetime-local" value="{!! date('Y-m-d\TH:i', strtotime($event -> event_end)) !!}" id="eventend">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="routemap" class="col-form-label">Route Map</label>
                        <input name="route_map" class="form-control" type="file" value="" id="routemap">
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="fee" class="col-form-label">Event Fee in (Php)</label>
                                <input name="event_fee" required class="form-control" type="number" value="{{$event->event_fee}}" step="0.01" id="fee">
                            </div>
                        </div>
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label class="col-form-label">Status</label>
                                <select class="form-control" name="event_status">
                                    @foreach ($status as $stat_id => $status)
                                        <option value="{{$stat_id}}" {{ ( $stat_id == $event->event_status) ? 'selected' : '' }}>{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group">
                                <button class="btn btn-flat btn-outline-primary" type="submit">Update Event</button>
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