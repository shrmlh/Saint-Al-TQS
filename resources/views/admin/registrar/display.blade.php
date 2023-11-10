@extends('layouts.admin')

@section('title', 'Display')

@section('pagetitle')
<div class="col-sm-6">
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Reports</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('admin') }}">Dashboard</a></li>
            <li><span>Reports</span></li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="row" style="background-color: white;">
    <!-- Progress Table start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
            @include('admin.parts.flash-message')
                <div class="row" style="background-color: white;">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                
                            <h4 class="header-title">Upload video for live monitor</h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <form action="{{ route('upload-video') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <!-- <input type="file" name="video">
                                            <button type="submit">Upload</button> -->
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="video" name="video" required>
                                                    <label class="custom-file-label" for="video">Choose file</label>
                                                </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Upload</button>
                                            </div>
                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#remove" style="margin-left:120px">Remove Video</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="background-color: white;">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <video controls width="640" height="360" autoplay loop>
                                    <source src="{{ asset('storage/videos/myvideo.mp4') }}" type="video/mp4" >
                                    Your browser does not support the video tag.
                                </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal -->
                <div class="modal fade" id="remove" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" id="outprint">
                            <!-- <div class="modal-header">
                                <h3>Message</h3>
                            </div> -->

                            <form action="{{ route('delete-video') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="modal-body">
                                    <p>Are you sure to remove this video?<p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" id="print">Yes</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
                <!-- Modal end --> 
            </div>
        </div>
    </div>
</div>


@endsection

@section('customscript')
<script src="{{ asset('/js/percentage.js') }}"></script>
@endsection