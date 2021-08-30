@extends('layouts.admin')
@section('customstyle')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endsection
@section('title', 'Edit Station')

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
                        <div class="col-lg-12 my-1">
                            <div class="form-group">
                                <input name="station" value="{{$eventstation->station}}" required class="form-control" type="text" id="station" placeholder="Station">
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <select required class="form-control assigned_user" id="assigned_user" name="assigned_user">
                                    <option value="{{$eventstation->assigned_user}}">{{ $eventstation->assigneduser->lastname }}, {{ $eventstation->assigneduser->firstname }} {{ $eventstation->assigneduser->middleInitial }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <button class="btn btn-flat btn-outline-primary w-100" type="submit">Update Station</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customscript')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Script -->
<script type="text/javascript">
    $(".assigned_user").select2({
        placeholder: 'Assign Personnel',
        ajax: {
            url: "{{route('getUsers')}}",
            dataType: 'json',
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        width:"100%"
    });
</script>
@endsection