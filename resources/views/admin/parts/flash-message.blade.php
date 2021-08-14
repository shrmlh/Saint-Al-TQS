@if ($message = Session::get('success'))
<div class="alert-dismiss">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
        </button>
    </div>
</div>
@elseif($message = Session::get('danger'))
<div class="alert-dismiss">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
        </button>
    </div>
</div>
@elseif($message = Session::get('warning'))
<div class="alert-dismiss">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
        </button>
    </div>
</div>
@elseif($message = Session::get('info'))
<div class="alert-dismiss">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
        </button>
    </div>
</div>
@endif