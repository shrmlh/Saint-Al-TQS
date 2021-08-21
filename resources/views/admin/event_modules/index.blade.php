@extends('layouts.admin')

@section('title', 'Home')

@section('pagetitle')
<div class="col-sm-6">
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Events</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('admin') }}">Home</a></li>
            <li><span>List of Events</span></li>
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
                            <h4 class="header-title">List of Events</h4>
                            </div>
                        <div class="pull-right">
                            <a class="btn btn-flat btn-outline-primary mb-3" href="{{ route('createEvent') }}"><i class="fa fa-calendar-plus-o"></i> Create New Event</a>
                        </div>
                    </div>
                   
                </div>
               
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">Event</th>
                                    <th scope="col">Start of Registration</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Progress</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                @if($loop->last)
                                    <input type="hidden" id="event_count" value="{{$loop->count}}">
                                @endif
                                <tr>
                                    <th scope="row">{{$event -> title}}</th>
                                    <td>{!! date('M-d-Y | h:i a', strtotime($event -> reg_start)) !!}</td>
                                    <td>{!! date('M-d-Y | h:i a', strtotime($event -> event_start)) !!}</td>
                                    <td>{!! date('M-d-Y | h:i a', strtotime($event -> event_end)) !!}</td>
                                    <td>
                                        <input type="hidden" id="reg_start{{$loop -> iteration}}" value="{{$event -> reg_start}}">
                                        <input type="hidden" id="event_start{{$loop -> iteration}}" value="{{$event -> event_start}}">
                                        <input type="hidden" id="event_end{{$loop -> iteration}}" value="{{$event -> event_end}}">
                                        <input type="hidden" id="event_status{{$loop -> iteration}}" value="{{$event->eventstatus->status}}">
                                        <div class="progress" style="height: 18px">
                                            <div class="progress-bar" id="progressor{{$loop -> iteration}}" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="status-progress" style="height: auto;">
                                            <span class="status-p" id="progressStatus{{$loop -> iteration}}">{{$event->eventstatus->status}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3"><a href="#" class="text-secondary"><i class="fa fa-list-ol"></i></a></li>
                                            <li class="mr-3"><a href="#" class="text-secondary"><i class="fa fa-gift"></i></a></li>
                                            <li class="mr-3"><a href="{{ route('editEvent',$event->id) }}" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                            <li>
                                                <form action="{{ route('deleteEvent',$event->id) }}" method="POST">
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

@section('customscript')
<script src="{{ asset('/js/percentage.js') }}"></script>
@endsection