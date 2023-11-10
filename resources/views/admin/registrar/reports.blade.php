@extends('layouts.admin')

@section('title', 'Reports')

<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <!-- <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="assets/js/vendor/jquery-3.7.0.js"></script>
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js">

    <link rel="stylesheet" href="assets/css/bootstrap.css.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css"> -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.7/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.11.7/sorting/daterange.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>




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
@php
    use App\Models\Queue;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    
    use Carbon\Carbon;

    $today = Carbon::today();

    $qall = Queue::where('transaction', '!=', "CASHIER")->whereIn('status', [0, 1, 2, 3])->count();
    $dataR = Queue::where('transaction', '!=', "CASHIER")->get();

    $qallC = Queue::where('transaction', '=', "CASHIER")->whereIn('status', [0, 1, 2, 3])->count();
    $dataC = Queue::where('transaction', '=', "CASHIER")->get();

    $Fname = Auth::user()->firstname;
    $Mname = Auth::user()->middleInitial;
    $Lname = Auth::user()->lastname;

    $userName = $Lname . ', ' . $Fname . ' ' . $Mname;
    
@endphp
@section('content')
<div class="row" style="background-color: white;">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                @include('admin.parts.flash-message')

                @if (Auth::user()->role == '1')
                    <button class="btn btn-flat btn-outline-primary mb-3" id="print-button">Print Table</button>

                    <div class="row">
                        <div class="col-md-6" >
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="min-date">Min Date:</label>
                                        <input type="date" class="form-control" id="min-date" placeholder="Min Date">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" >
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="max-date">Max Date:</label>
                                        <input type="date" class="form-control" id="max-date" placeholder="Max Date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    
                    <div  class="row">
                        <div class="col-md-12" >
                            <div class="card">
                                <div class="card-body">
                                <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Queue No</th>
                                            <th>Transaction</th>
                                            <th>Serving Time</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($qall == 0)
                                            <tr>
                                                <td>No item</td>
                                            </tr>
                                        @else
                                            @foreach ($dataR as $item)
                                                <tr>
                                                    <td>{{ $item->queue_no }}</td>
                                                    <td>{{ $item->transaction }}</td>
                                                    @if ( $item->serving_time == null)
                                                        <td>---</td>
                                                    @else
                                                        <td>{{ $item->serving_time }}</td>
                                                    @endif
                                                    @if ( $item->status == 0)
                                                        <td>Pending</td>
                                                    @elseif ( $item->status == 1)
                                                        <td>Serving</td>
                                                    @elseif ( $item->status == 2)
                                                        <td>Done</td>
                                                    @elseif ( $item->status == 3)
                                                        <td>No Show</td>
                                                    @endif
                                                    <td>{{ $item->created_at }}</td>
                                                </tr>
                                            
                                            @endforeach
                                        @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

                @if (Auth::user()->role == '2')
                    <button class="btn btn-flat btn-outline-primary mb-3" id="print-button">Print Table</button>

                    <div class="row">
                        <div class="col-md-6" >
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="min-date">Min Date:</label>
                                        <input type="date" class="form-control" id="min-date" placeholder="Min Date">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" >
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="max-date">Max Date:</label>
                                        <input type="date" class="form-control" id="max-date" placeholder="Max Date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div  class="row">
                        <div class="col-md-12" >
                            <div class="card">
                                <div class="card-body">
                                <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Queue No</th>
                                            <th>Transaction</th>
                                            <th>Serving Time</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($qallC == 0)
                                            <tr>
                                                <td>No item</td>
                                            </tr>
                                        @else
                                            @foreach ($dataC as $item)
                                                <tr>
                                                    <td>{{ $item->queue_no }}</td>
                                                    <td>{{ $item->transaction }}</td>
                                                    @if ( $item->serving_time == null)
                                                        <td>---</td>
                                                    @else
                                                        <td>{{ $item->serving_time }}</td>
                                                    @endif
                                                    @if ( $item->status == 0)
                                                        <td>Pending</td>
                                                    @elseif ( $item->status == 1)
                                                        <td>Serving</td>
                                                    @elseif ( $item->status == 2)
                                                        <td>Done</td>
                                                    @elseif ( $item->status == 3)
                                                        <td>No Show</td>
                                                    @endif
                                                    <td>{{ $item->created_at }}</td>
                                                </tr>
                                            
                                            @endforeach
                                        @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif



                





                
            </div>
        </div>
    </div>
</div>

@endsection

@section('customscript')
<!-- jquery latest version -->
<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
<!-- <script>
    new DataTable('#example');
</script> -->

<!-- <script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            paging: true,
            searching: true, // Optionally enable the search bar
        });
    });
</script> -->
<script>

var userName = "<?php echo $userName; ?>";

    $(document).ready(function() {
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('#min-date').val();
                var max = $('#max-date').val();
                var date = data[4]; // Assuming the Date column is at index 4 (change it to match your table).

                if (
                    (min === "" && max === "") ||
                    (min === "" && date <= max) ||
                    (min <= date && max === "") ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        var table = $('#myTable').DataTable({
            paging: true,
            searching: true,

            // buttons: [
            //     'copy', 'excel', 'pdf', 'print'
            // ]
        });

        $('#min-date, #max-date').on('keyup change', function() {
            table.draw();
        });

        // Idinagdag natin ang event listener para sa print button
        $('#print-button').on('click', function () {
            // Get the data of the currently displayed rows
                var displayedData = table.rows({ page: 'current' }).data();
                            // Get the current date
                    const date = new Date();

                    const options = {
                        weekday: 'long', // 'short', 'long', or 'narrow'
                        year: 'numeric', // 'numeric' or '2-digit'
                        month: 'long', // 'short', 'long', or 'numeric'
                        day: 'numeric' // 'numeric' or '2-digit'
                    };

                    const locale = 'en-US'; // Specify the desired locale

                    const formattedDate = date.toLocaleDateString(locale, options);
                    console.log(formattedDate); // Example output: "Thursday, November 10, 2023"
                // var currentDate = new Date();
                // var formattedDate = currentDate.toLocaleDateString();

                            // Get the values of the 'min-date' and 'max-date' input fields
                var minDateValue = $('#min-date').val();
                var maxDateValue = $('#max-date').val();

            // Build the HTML structure for the print window
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Print</title></head><body>');
            printWindow.document.write('<style>');
            // Center the image horizontally
            printWindow.document.write('body { font-family: "Calibri", sans-serif; }');
            printWindow.document.write('img { display: block; margin: 0 auto; }');
            printWindow.document.write('</style>');
            printWindow.document.write('</head><body>');
            // Insert the image logo
            printWindow.document.write('<img src="school_logo.jpg" alt="School Logo">');
            printWindow.document.write('<h3>Report Date: ' + minDateValue + ' - ' +  maxDateValue + '</h3>');
            printWindow.document.write('<table class="table table-striped table-bordered">');
            printWindow.document.write('<thead>' + $('#myTable thead').html() + '</thead>');
            printWindow.document.write('<tbody>');

            displayedData.each(function (data) {
                printWindow.document.write('<tr>');
                data.forEach(function (cell) {
                    printWindow.document.write('<td>' + cell + '</td>');
                });
                printWindow.document.write('</tr>');
            });

            printWindow.document.write('</tbody></table>');
            
            
            printWindow.document.write('<h3>Prepared by: ' + userName +'</h3>'); // Replace with the user's name
            printWindow.document.write('<h6>Date Generated: ' + formattedDate + '</h6>');
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
            printWindow.close();
                    });
    });
</script>




@endsection