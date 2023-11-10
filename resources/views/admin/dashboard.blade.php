@extends('layouts.admin')

@section('title', 'Home')

@section('pagetitle')
<div class="col-sm-6">
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Dashboard</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('admin') }}">Home</a></li>
            <li><span>Dashboard</span></li>
        </ul>
    </div>
</div>
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
@endsection

@php
    use App\Models\Queue;
    use App\Models\User;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    
    use Carbon\Carbon;

    $today = Carbon::today();

    $user = User::where('status', '=', 1)->count();

    $data = Queue::where('transaction', '!=', "CASHIER")->whereIn('status', [0, 1])->whereDate('created_at', $today)->get();
    $ServingR = Queue::where('transaction','!=', "CASHIER")->whereIn('status', [0, 1])->get();
    $firstItem = Queue::where('transaction','!=', "CASHIER")->whereIn('status', [0, 1])->orderBy('created_at', 'asc')->first();
    
    $RQ_no = Queue::where('transaction','!=', "CASHIER")->where('status', 2)->whereDate('created_at', $today)->count();

    $table = Queue::where('transaction','!=', "CASHIER")->where('status', '==', 0)->count();

    $userID = Auth::id();

    $dataC = Queue::where('transaction', '=', "CASHIER")->where('status', '==', 0)->whereDate('created_at', $today)->get();
    $firstItemC = Queue::where('transaction','=', "CASHIER")->where('status', '==', 0)->first();
    
    $CQ_no = Queue::where('transaction','=', "CASHIER")->where('status', '!=', 0)->whereDate('created_at', $today)->count();

    $tableC = Queue::where('transaction','=', "CASHIER")->where('status', '==', 0)->count();

    //GRAPH
    // Sa controller o kahit saan mo kinukuha ang iyong data mula sa database
    $queueData = Queue::where('transaction','=', "CASHIER")->where('status', 2)->get();

    // Pagkuha ng mga values para sa ZingChart
    $values = $queueData->pluck('queue_no')->toArray();
@endphp

@section('content')
<div class="row" style="background-color: white;">
    <!-- Progress Table start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <!-- CASHIER -->
            @if (Auth::user()->role == '2')
                 <!-- sales report area start -->
                <div class="sales-report-area mt-2 mb-2">
                    <div class="row">
                        <div class="col-md-4" >
                            <div class="single-report mb-xs-30" style="border: 1px solid #000435;">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon" style="background-color: #000435;"><i class="ti-files"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total served for today</h4>
                                        <!-- <p>24 H</p> -->
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>Registrar</h2>
                                        <span>{{$RQ_no}}</span>
                                    </div>
                                </div>
                                <!-- <canvas id="coin_sales1" height="100"></canvas> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30" style="border: 1px solid #000435;">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon" style="background-color: #000435;"><i class="ti-receipt"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total served for today</h4>
                                        <!-- <p>24 H</p> -->
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>Cashier</h2>
                                        <span>{{$CQ_no}}</span>
                                    </div>
                                </div>
                                <!-- <canvas id="coin_sales1" height="100"></canvas> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30" style="border: 1px solid #000435;">
                                <div class="s-report-inner pr--20 pt--30 mb-3" >
                                    <div class="icon" style="background-color: #000435;"><i class="ti-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total System Users</h4>
                                        <!-- <p>24 H</p> -->
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>Registered</h2>
                                        <span>{{$user}}</span>
                                    </div>
                                </div>
                                <!-- <canvas id="coin_sales2" height="100"></canvas> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sales report area end -->
                <!-- overview area start -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="header-title mb-0">Overview</h4>
                                    <!-- <select class="custome-select border-0 pr-3">
                                        <option selected>Last 24 Hours</option>
                                        <option value="0">01 July 2018</option>
                                    </select> -->
                                </div>
                                <div id="verview-shart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- overview area end -->
            @endif


            <!-- REGISTRAR -->
            @if (Auth::user()->role == '1')
            <!-- sales report area start -->
                <div class="sales-report-area mt-2 mb-2">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30" style="border: 1px solid #000435;">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon" style="background-color: #000435;"><i class="ti-files"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total served for today</h4>
                                        <!-- <p>24 H</p> -->
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>Registrar</h2>
                                        <span>{{$RQ_no}}</span>
                                    </div>
                                </div>
                                <!-- <canvas id="coin_sales1" height="100"></canvas> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30" style="border: 1px solid #000435;">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon" style="background-color: #000435;"><i class="ti-receipt"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total served for today</h4>
                                        <!-- <p>24 H</p> -->
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>Cashier</h2>
                                        <span>{{$CQ_no}}</span>
                                    </div>
                                </div>
                                <!-- <canvas id="coin_sales1" height="100"></canvas> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30" style="border: 1px solid #000435;">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon" style="background-color: #000435;"><i class="ti-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total System Users</h4>
                                        <!-- <p>24 H</p> -->
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>Registered</h2>
                                        <span>{{$user}}</span>
                                    </div>
                                </div>
                                <!-- <canvas id="coin_sales2" height="100"></canvas> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sales report area end -->
                <!-- overview area start -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="header-title mb-0">Overview</h4>
                                    <!-- <select class="custome-select border-0 pr-3">
                                        <option selected>Last 24 Hours</option>
                                        <option value="0">01 July 2018</option>
                                    </select> -->
                                </div>
                                <div id="verview-shart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- overview area end -->




            @endif
                
                </div>
            </div>
        </div>
    </div>
</div>
            

@endsection



@section('customscript')
<script>
if ($('#verview-shart').length) {
    var myConfig = {
        "type": "line",
        "scale-x": { // X-Axis (oras mula 7 AM hanggang 8 PM)
            "labels": ["7 AM", "8 AM", "9 AM", "10 AM", "11 AM", "12 PM", "1 PM", "2 PM", "3 PM", "4 PM", "5 PM", "6 PM", "7 PM", "8 PM"],
            "label": {
                "text": "Time",
                "font-size": 14,
                "offset-x": 0,
            },
            "item": {
                "font-size": 10,
            },
            "guide": {
                "visible": false,
                "line-style": "solid",
                "alpha": 1
            }
        },
        "scale-y": { // Y-Axis (total number of queue served)
            "label": {
                "text": "Total Queue Served",
                "font-size": 14,
                "offset-y": 0,
            },
            "item": {
                "font-size": 10,
            },
        },


        // "plot": { "aspect": "spline" },
        // "series": [{
        //         "values": [10, 25, 30, 35, 45, 40, 40, 35, 25, 17, 40, 50],
        //         "line-color": "#F0B41A",
        //         "line-width": 5,
        //         "marker": {
        //             "background-color": "#D79D3B",
        //             "size": 5,
        //             "border-color": "#D79D3B",
        //         }
        //     },
        //     {
        //         "values": [20, 40, 45, 30, 20, 30, 35, 45, 55, 40, 30, 55],
        //         "line-color": "#0884D9",
        //         "line-width": 5,
        //         "marker": {
        //             "background-color": "#067dce",
        //             "size": 5,
        //             "border-color": "#067dce",
        //         }
        //     }
        // ]
        "plot" => ["aspect" => "spline"],
        "series" => [
            [
                "values" => $values,
                "line-color" => "#F0B41A",
                "line-width" => 5,
                "marker" => [
                    "background-color" => "#D79D3B",
                    "size" => 5,
                    "border-color" => "#D79D3B",
                ],
            ],
        ],
    };

    zingchart.render({
        id: 'verview-shart',
        data: myConfig,
        height: "100%",
        width: "100%"
    });
}

</script>
@endsection


