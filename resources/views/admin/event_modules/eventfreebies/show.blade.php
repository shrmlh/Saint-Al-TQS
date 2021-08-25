@extends('layouts.admin')

@section('title', 'Freebies')

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
                    <table class="table" id="dynamicAddRemove" rules="none">
                        <tr>
                            <td>
                                <div class="input-group">
                                    <input type="hidden" name="addMoreInputFields[0][event]" value="{{$event->id}}">
                                    <input name="addMoreInputFields[0][freebie]" required class="form-control" type="text" id="freebie" placeholder="Freebie">
                                    <div class="input-group-append">
                                        <button type="button" name="add" id="dynamic-ar" class="btn btn-flat btn-outline-primary" style="width: 100px">Add</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="form-row align-items-center">
                        <div class="form-group col-lg-12">
                            <button class="btn btn-flat btn-outline-primary w-100" type="submit">Add Freebie</button>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append(
        '<tr>'+
            '<td>'+
            
                '<div class="input-group"><input type="hidden" name="addMoreInputFields['+i+'][event]" value="'+{{$event->id}}+'">'+
                
                '<input name="addMoreInputFields['+i+'][freebie]" required class="form-control" type="text" id="freebie" placeholder="Freebie">'+
            
                '<div class="input-group-append"><button type="button" class="btn btn-flat btn-outline-danger remove-input-field" style="width: 100px">Delete</button></div></div>'+
            
            '</td>'+
        '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection