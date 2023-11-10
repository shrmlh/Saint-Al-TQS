<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    @yield('customstyle')

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

   
    </head>

<!-- functions -->
@php
    use App\Models\Queue;
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;

    $today = Carbon::today();
    
    //$tableName = 'cashier'; 
    //$nextId = DB::select("SHOW TABLE STATUS LIKE '{$tableName}'")[0]->Auto_increment;

    //$RQ = Queue::count('queue_no');
   
    $RQ = Queue::whereIn('status', [0,1,2,3])->whereDate('created_at', $today)->where(function($query) {$query->where('queue_no', 'LIKE', '%R%');})->count();

    $RQ_no = $RQ + 1;
    
@endphp
<!-- functions -->





    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                       <a href="{{ route('back') }}" class="ml-4 text-sm text-gray-700 underline">BACK</a>
                    </div>
                </div>

                <h1>SELECT TRANSACTION FOR REGISTRAR</h1>
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-1"  style="align:center;" >
                        <div class="p-2">
                            <div class="flex items-center" >
                                <!-- basic modal start -->
                                <!-- <div class="card-body"> -->
                                    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#Modal1" style="background-color:#000435; ">INQUIRY</button>
                                    <!-- Modal start -->
                                    <div class="modal fade" id="Modal1" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered" role="document" style="text-align: center">
                                            <div class="modal-content" id="outprint">
                                                <div class="modal-header">
                                                    <img src="http://127.0.0.1:8000/appimages/events/logo2.webp" alt="logo" width="400" height="400">
                                                    <!-- <button type="button" class="close" data-dismiss="modal"><span>×</span></button> -->
                                                </div>
                                                <form action="{{ route('storeQueue') }}" method="POST" enctype="multipart/form-data"  id="printForm1">
                                                @csrf
                                                    <div class="modal-body">
                                                        <h6 class="modal-title">Priority No.</h6>
                                                        <div class="form-group">
                                                            <h1 type="text">R{{$RQ_no}}</h1>
                                                            <span>INQUIRY | </span>
                                                            <input name="queue_no" required type="text" id="queue_no" value="R{{$RQ_no}}" style="display: none;"></input>
                                                            <input name="transaction" required type="text" id="transaction" value="INQUIRY" style="display: none;"></input>
                                                            <span id="currentDateTime"></span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary" id="print">Okay</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Modal end -->
                                <!-- </div> -->
                            </div>
                        </div>

                        <div class="p-2 ">
                            <div class="flex items-center">
                                <!-- basic modal start -->
                                <!-- <div class="card-body"> -->
                                    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#Modal2" style="background-color:#000435; ">REQUEST</button>
                                    <!-- Modal start -->
                                    <div class="modal fade" id="Modal2" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered" role="document" style="text-align: center">
                                            <div class="modal-content" id="outprint">
                                                <div class="modal-header">
                                                    <img src="http://127.0.0.1:8000/appimages/events/logo2.webp" alt="logo" width="400" height="400" id="printForm2">
                                                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                                </div>
                                                <form action="{{ route('storeQueue') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                    <div class="modal-body">
                                                        <h6 class="modal-title">Priority No.</h6>
                                                        <div class="form-group">
                                                            <h1 type="text">R{{$RQ_no}}</h1>
                                                            <span>REQUEST | </span>
                                                            <input name="queue_no" required type="text" id="queue_no" value="R{{$RQ_no}}" style="display: none;"></input>
                                                            <input name="transaction" required type="text" id="transaction" value="REQUEST" style="display: none;"></input>
                                                            <span id="currentDateTime2"></span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary" id="print">Okay</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Modal end -->
                                <!-- </div> -->
                            </div>
                        </div>

                        <div class="p-2">
                            <div class="flex items-center" >
                                <!-- basic modal start -->
                                <!-- <div class="card-body"> -->
                                    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#Modal3" style="background-color:#000435;">ENROLL</button>
                                    <!-- Modal start -->
                                    <div class="modal fade" id="Modal3" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered" role="document" style="text-align: center">
                                            <div class="modal-content" id="outprint">
                                                <div class="modal-header">
                                                    <img src="http://127.0.0.1:8000/appimages/events/logo2.webp" alt="logo" width="400" height="400">
                                                </div>
                                                <form action="{{ route('storeQueue') }}" method="POST" enctype="multipart/form-data" id="printForm3">
                                                @csrf
                                                    <div class="modal-body">
                                                        <h6 class="modal-title">Priority No.</h6>
                                                        <div class="form-group">
                                                            <h1 type="text">R{{$RQ_no}}</h1>
                                                            <span>ENROLL | </span>
                                                            <input name="queue_no" required type="text" id="queue_no" value="R{{$RQ_no}}" style="display: none;"></input>
                                                            <input name="transaction" required type="text" id="transaction" value="ENROLL" style="display: none;"></input>
                                                            <span id="currentDateTime3"></span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary" id="print">Okay</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Modal end -->
                                <!-- </div> -->
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>


    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- DATE AND TIME -->
    <script type="text/javascript">
    function updateDateTime() {
        var currentDateTime = new Date();
        var formattedDateTime = currentDateTime.toLocaleString('en-US', { weekday: 'long', month: 'long', day: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit' }); // I-convert ang oras at petsa sa isang pormat na mababasa

        document.getElementById("currentDateTime").textContent = formattedDateTime;
        document.getElementById("currentDateTime2").textContent = formattedDateTime;
        document.getElementById("currentDateTime3").textContent = formattedDateTime;
    }

    // Tumawag sa updateDateTime() upang simulan ang pag-update ng oras at petsa
    updateDateTime();

    // I-update ang oras at petsa tuwing 1 segundo
    setInterval(updateDateTime, 1000);

    </script>

<script>
 // Listen for form submission
 document.getElementById("printForm1").addEventListener("submit", function(event) {
        if (!window.confirm("Do you want to print and submit this form?")) {
            event.preventDefault(); // Prevent the form from being submitted
        }
        else{
            var _el = $('<div>')
            var _h = $('head').clone()
            var _p = $('#outprint').clone()
            _h.find('title').text("Queue Number - Print")
            _el.append(_h)
            
            var _modalContent = $('#Modal1').clone()
            _modalContent.find('.modal-footer').hide()
            _el.append(_modalContent)
            var nw = window.open('','_blank','width=700,height=500,top=75,left=200')
                nw.document.write(_el.html())
                nw.document.close()
                // setTimeout(() => {
                //     nw.print()
                //     setTimeout(() => {
                //         nw.close()
                //         $('#Modal1').modal('hide')
                //     }, 200);
                // }, 500);
                // nw.print()
                //     setTimeout(() => {
                //         nw.close()
                //         $('#Modal1').modal('hide')
                //     }, 200);
        }
    });
</script>

<script>
 // Listen for form submission
 document.getElementById("printForm2").addEventListener("submit", function(event) {
        if (!window.confirm("Do you want to print and submit this form?")) {
            event.preventDefault(); // Prevent the form from being submitted
        }
        else{
            var _el = $('<div>')
            var _h = $('head').clone()
            var _p = $('#outprint').clone()
            _h.find('title').text("Queue Number - Print")
            _el.append(_h)
            
            var _modalContent = $('#Modal2').clone()
            _modalContent.find('.modal-footer').hide()
            _el.append(_modalContent)
            var nw = window.open('','_blank','width=700,height=500,top=75,left=200')
                nw.document.write(_el.html())
                nw.document.close()
                // setTimeout(() => {
                //     nw.print()
                //     setTimeout(() => {
                //         nw.close()
                //         $('#Modal2').modal('hide')
                //     }, 200);
                // }, 500);
        }
    });
</script>

<script>
 // Listen for form submission
 document.getElementById("printForm3").addEventListener("submit", function(event) {
        if (!window.confirm("Do you want to print and submit this form?")) {
            event.preventDefault(); // Prevent the form from being submitted
        }
        else{
            var _el = $('<div>')
            var _h = $('head').clone()
            var _p = $('#outprint').clone()
            _h.find('title').text("Queue Number - Print")
            _el.append(_h)
            
            var _modalContent = $('#Modal3').clone()
            _modalContent.find('.modal-footer').hide()
            _el.append(_modalContent)
            var nw = window.open('','_blank','width=700,height=500,top=75,left=200')
                nw.document.write(_el.html())
                nw.document.close()
                // setTimeout(() => {
                //     nw.print()
                //     setTimeout(() => {
                //         nw.close()
                //         $('#Modal3').modal('hide')
                //     }, 200);
                // }, 500);
        }
    });
</script>

    </body>
</html>
