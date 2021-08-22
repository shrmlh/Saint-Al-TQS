@extends('layouts.admin')

@section('title', 'Home')

@section('pagetitle')
<div class="col-sm-6">
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Events</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('admin') }}">Home</a></li>
            <li><a href="{{ route('eventsList') }}">List of Events</a></li>
            <li><span>{{$event->title}}</span></li>
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
                <form action="{{ route('storeEventFreebie') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-lg-10 col-md-8 my-1">
                            <input type="hidden" name="event" value="{{$event->id}}">
                            <div class="form-group">
                                <input name="freebie" required class="form-control" type="text" id="freebie" placeholder="Freebie">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 my-1">
                            <div class="form-group">
                                <button class="btn btn-flat btn-outline-primary w-100" type="submit">Add Freebie</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row align-items-center">
                   
                    <div class="col-sm-12 clearfix">
                        <div class="pull-left">
                        <h4 class="header-title">Event: {{$event->title}}</h4>
                        </div>
                    </div>
                   
                </div>
               
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Freebie</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Date Updated</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($event->eventfreebies as $eventfreebie)
                                <tr>
                                    <td>{{$loop -> iteration}}</td>
                                    <th scope="row">{{ $eventfreebie->freebie }}</th>
                                    <td>{!! date('M-d-Y | h:i a', strtotime($eventfreebie->created_at)) !!}</td>
                                    <td>{!! date('M-d-Y | h:i a', strtotime($eventfreebie->updated_at)) !!}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3"><a href="{{ route('editEventFreebie',$eventfreebie->id) }}" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                            <li>
                                                <form action="{{ route('deleteEventFreebie',$eventfreebie->id) }}" method="POST">
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