<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CR1M - @yield('title')</title>
    
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('customstyle')
    </head>

                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                       <a href="{{ route('back') }}" class="ml-4 text-sm text-gray-700 underline">BACK</a>
                    </div>
                </div>


@php
    use App\Models\Queue;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use Carbon\Carbon;

    $today = Carbon::today();

    //$data = Queue::where('status', '==', 0)->whereDate('created_at', $today)->get();
    $data = Queue::where('status', '==', 0)->where('transaction', '!=', 'CASHIER')->whereDate('created_at', $today)->get();
    $dataC = Queue::where('status', '==', 0)->where('transaction', '=', 'CASHIER')->whereDate('created_at', $today)->get();
    $dataS = Queue::where('status', 1)->whereDate('created_at', $today)->get();
    
    $firstItem = Queue::where('status', 1)->whereDate('created_at', $today)->orderBy('updated_at', 'asc')->first();
@endphp






    <div class="card-body">
        <div class="header-title"><span id="currentDateTime"></span></div>
        
        <div class="row no-gutters">
            <div class="col-sm-7">
                <div class="grid-col">
                    <video controls width="640" height="360" autoplay loop>
                        <source src="{{ asset('storage/videos/myvideo.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <div class="col-sm-5" id="refreshable-div">
                <div class="grid-col" id="refreshable-div">
                    <h2>NOW SERVING</h2>
                    @if ($dataS->isEmpty())
                        <button type="button" class="btn btn-flat btn-primary btn-lg btn-block"  id="ServingQ"><h1>---</h1></button>
                    @else
                        <button type="button" class="btn btn-flat btn-primary btn-lg btn-block" id="queue-number"><h1>{{ $firstItem->queue_no }}</h1></button>
                    @endif
                </div>
                <div class="grid-col">
                    <h2>PROCEED TO</h2>
                    @if ($dataS->isEmpty())
                        <button type="button" class="btn btn-flat btn-primary btn-lg btn-block"><h1>---</h1></button>
                    @else
                        @if ($firstItem->transaction == "CASHIER")
                            <button type="button" class="btn btn-flat btn-primary btn-lg btn-block"><h1>CASHIER</h1></button>
                        @else
                            <button type="button" class="btn btn-flat btn-primary btn-lg btn-block"><h1>REGISTRAR</h1></button>
                        @endif
                    @endif
                </div>
                    
            </div>
        </div>

        <div class="row no-gutters" id="refreshable-div1">
            <div class="col-sm-10">
                <h4>UPCOMING</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover progress-table text-center">
                                <thead class="text-uppercase">
                                </thead>
                                <tbody>
                                    @if ($data->isEmpty())
                                        <tr>
                                            <td>No item.</td>
                                        </tr>
                                    @else
                                        <tr>
                                            @foreach ($data as $key => $item)
                                                @if ($key < 7 )
                                                        <td>{{$item->queue_no}}</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            @foreach ($dataC as $key => $item)
                                                @if ($key < 7 )
                                                        <td>{{$item->queue_no}}</td>
                                                @endif
                                            @endforeach
                                        </tr>

                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <div class="col-sm-2">
                <h4>>></h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover progress-table text-center">
                                <thead class="text-uppercase">
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>REGISTRAR</td>
                                        </tr>
                                        <tr>
                                            <td>CASHIER</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
        

    </div>

    </body>

@section('customscript')
<script src="{{ asset('/js/percentage.js') }}"></script>


@endsection

<!-- DATE AND TIME -->
<script type="text/javascript">
    function updateDateTime() {
        var currentDateTime = new Date();
        var formattedDateTime = currentDateTime.toLocaleString('en-US', { weekday: 'long', month: 'long', day: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit' }); // I-convert ang oras at petsa sa isang pormat na mababasa

        document.getElementById("currentDateTime").textContent = formattedDateTime;
    }

    // Tumawag sa updateDateTime() upang simulan ang pag-update ng oras at petsa
    updateDateTime();

    // I-update ang oras at petsa tuwing 1 segundo
    setInterval(updateDateTime, 1000);

</script>
<script>
function refreshContent() {
    // Dito mo ilalagay ang AJAX request o pagkuha ng bagong nilalaman mula sa server
    $.ajax({
    url: "display_serving", // Ilagay dito ang URL ng endpoint na nais mong gamitin
    method: "GET",
    success: function(data) {
        $("#refreshable-div").html(data); // I-update ang content ng <div class="grid-col"></div> gamit ang data mula sa server
    }
    });
}

// Itakda ang interval ng pag-refresh (sa milisekundo)
var refreshInterval = 1000; // Halimbawa, mag-refresh kada 5 segundo (5000 milliseconds)
setInterval(refreshContent, refreshInterval);
</script>


<script>
function refreshContent2() {
    // Dito mo ilalagay ang AJAX request o pagkuha ng bagong nilalaman mula sa server
    $.ajax({
    url: "display_table", // Ilagay dito ang URL ng endpoint na nais mong gamitin
    method: "GET",
    success: function(data) {
        $("#refreshable-div1").html(data); // I-update ang content ng <div class="grid-col"></div> gamit ang data mula sa server
    }
    });
}

// Itakda ang interval ng pag-refresh (sa milisekundo)
var refreshInterval = 1000; // Halimbawa, mag-refresh kada 5 segundo (5000 milliseconds)
setInterval(refreshContent2, refreshInterval);
</script>



