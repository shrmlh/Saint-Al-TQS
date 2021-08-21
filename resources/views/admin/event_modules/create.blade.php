@extends('layouts.admin')

@section('title', 'Home')

@section('pagetitle')
<div class="col-sm-6">
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Create Event</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('admin') }}">Home</a></li>
            <li><span>Create Event</span></li>
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
                <form action="{{ route('storeEvent') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="col-form-label">Title</label>
                        <input name="title" required class="form-control" type="text" id="title">
                    </div>
                    <div class="form-group">
                        <label for="theme" class="col-form-label">Theme</label>
                        <input name="theme" required class="form-control" type="text" id="theme">
                    </div>
                    <div class="form-group">
                        <label for="regstart" class="col-form-label">Start of Registration</label>
                        <input name="reg_start" required class="form-control" type="datetime-local" value="" id="regstart">
                    </div>
                    
                    <div class="form-row align-items-center">
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="eventstart" class="col-form-label">Start Date</label>
                                <input name="event_start" required class="form-control" type="datetime-local" value="" id="eventstart">
                            </div>
                        </div>
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="eventend" class="col-form-label">End Date</label>
                                <input name="event_end" required class="form-control" type="datetime-local" value="" id="eventend">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="routemap" class="col-form-label">Route Map</label>
                        <input name="route_map" required class="form-control" type="file" id="routemap">
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label for="fee" class="col-form-label">Event Fee in (Php)</label>
                                <input name="event_fee" required class="form-control" type="number" step="0.01" id="fee">
                            </div>
                        </div>
                        <div class="col-sm-6 my-1">
                            <div class="form-group">
                                <label class="col-form-label">Status</label>
                                <select class="form-control" name="event_status">
                                    @foreach ($status as $stat_id => $status)
                                        <option value="{{$stat_id}}">{{$status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group">
                                <button class="btn btn-flat btn-outline-primary" type="submit">Create Event</button>
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
<script src="{{ asset('/js/dategetter.js') }}"></script>
@endsection