@extends('layouts.admin')

@section('title', 'Queue')

@section('pagetitle')
<div class="col-sm-6">
    <div class="breadcrumbs-area clearfix">
        <h4 class="page-title pull-left">Queue</h4>
        <ul class="breadcrumbs pull-left">
            <li><a href="{{ route('admin') }}">Home</a></li>
            <li><span>Queue</span></li>
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

    $qall = Queue::whereIn('status', [0, 1])->whereDate('created_at', $today)->count();

    $qallR = Queue::where('transaction', '!=', "CASHIER")->whereIn('status', [0, 1])->whereDate('created_at', $today)->count();
    $qallC = Queue::where('transaction', '=', "CASHIER")->whereIn('status', [0, 1])->whereDate('created_at', $today)->count();
    $data = Queue::where('transaction', '!=', "CASHIER")->whereIn('status', [0, 1])->whereDate('created_at', $today)->get();

    $ServingR = Queue::where('transaction','!=', "CASHIER")->whereIn('status', [0, 1])->whereDate('created_at', $today)->get();
    $ServingC = Queue::where('transaction','=', "CASHIER")->whereIn('status', [0, 1])->whereDate('created_at', $today)->get();

    $firstItem = Queue::where('transaction','!=', "CASHIER")->whereIn('status', [0, 1])->orderBy('created_at', 'asc')->first();
    $firstItemC = Queue::where('transaction','=', "CASHIER")->whereIn('status', [0, 1])->orderBy('created_at', 'asc')->first();
    
    $RQ_no = Queue::where('transaction','!=', "CASHIER")->where('status', 2)->whereDate('created_at', $today)->count();

    $table = Queue::where('transaction','!=', "CASHIER")->where('status', '==', 0)->count();

    $userID = Auth::id();

    $dataC = Queue::where('transaction', '=', "CASHIER")->where('status', '==', 0)->whereDate('created_at', $today)->get();
    //$firstItemC = Queue::where('transaction','=', "CASHIER")->whereIn('status', [0, 1])->first();
    
    $CQ_no = Queue::where('transaction','=', "CASHIER")->where('status', '!=', 0)->whereDate('created_at', $today)->count();

    $tableC = Queue::where('transaction','=', "CASHIER")->where('status', '==', 0)->count();


    $Cupcoming = Queue::where('transaction','=', "CASHIER")->where('status', '=', 0)->whereDate('created_at', $today)->count();
    $Rupcoming = Queue::where('transaction','!=', "CASHIER")->where('status', '=', 0)->whereDate('created_at', $today)->count();
    
@endphp

@section('content')
<div class="row" style="background-color: white;">
    <!-- Progress Table start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                
                @include('admin.parts.flash-message')

                @if (Auth::user()->role == '1')
                    @if ($qallR == 0)
                        No data
                    @else
                        <!-- REGISTRAR -->
                        @if (Auth::user()->role == '1')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="grid-col">
                                    <!-- Queue table -->
                                    <div class="single-table">
                                        <div class="table-responsive">
                                            <table class="table text-center" width="50px" height="20px" overflow="auto">
                                                <thead class="text-uppercase bg-primary">
                                                    <tr class="text-white">
                                                        <th scope="col">Queue No</th>
                                                        <th scope="col">Transaction</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if ($data->isEmpty())
                                                <tr>
                                                                <td>No item.</td>
                                                            </tr>
                                                @else
                                                    @foreach ($data as $key => $item)
                                                        @if ($key > 0 && $key < 6)
                                                            <tr>
                                                                <td>{{ $item->queue_no}}</td>
                                                                <td>{{ $item->transaction }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--End Queue table -->
                                </div>
                            </div>

                            <div class="col-md-4" style="text-align:center;">
                                <div class="grid-col">
                                    <h1>NOW SERVING</h1>
                                    @if ($ServingR->isEmpty())
                                        <h1 class="btn btn-flat btn-info btn-lg btn-block">---</h1>
                                        <h3>FOR ---</h3>
                                    @else
                                        

                                        <h1 class="btn btn-flat btn-info btn-lg btn-block" id="queueNumber" style="font-size: 30px;">{{ $firstItem->queue_no }}</h1>
                                        <input name="queue_no1" required type="text" id="queue_no" value="{{ $firstItem->queue_no }}" style="display: none;"></input>
                                        <h3>FOR {{ $firstItem->transaction }}</h3>

                                        <h4>SERVING TIME:</h4>
                                        <h4 class="text-danger" id="timerLabel">00:00:00</h4>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="grid-col">
                                    <form method="POST" action="{{ route('call-servingQ') }}" id="callForm1">
                                    @csrf 
                                    @if ($ServingR->isEmpty())
                                        <button type="submit" class="btn btn-danger btn-lg btn-block" id="callButton1">RE-CALL</button>
                                    @else
                                        <input name="id1" required type="text" id="id1" value="{{ $firstItem->id }}" style="display: none;" ></input>
                                        <button type="submit" class="btn btn-danger btn-lg btn-block" id="callButton1">RE-CALL</button>
                                    @endif
                                        
                                    </form>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>
                                    $(document).ready(function() {
                                        $("form#callForm1").submit(function(event) {
                                            event.preventDefault(); // I-prevent ang default form submission
                                            var idValue = $("#id1").val();

                                            $.ajax({
                                                type: 'POST',
                                                url: '/call-servingQ',
                                                data: {
                                                    _token: "{{ csrf_token() }}",
                                                    id: idValue
                                                },
                                                success: function(response) {
                                                    // alert(response.message);
                                                    // setTimeout(function() {
                                                    //     window.close(); // Ito ay para isara ang alert
                                                    // }, 100);
                                                },
                                                error: function() {
                                                    // Kapag may error sa AJAX request
                                                }
                                            });
                                        });
                                    });
                                    </script>
                                    <audio id="introAudio1" src="http://127.0.0.1:8000/appimages/bell.wav" preload="auto" style="display: none;"></audio>
                                    <button type="button" class="btn btn-success btn-lg btn-block" id="startButton">START</button>
                                    <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#Next">NEXT</button>

                                    <!-- Modal start -->
                                    <div class="modal fade" id="Next" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content" id="outprint">
                                                <div class="modal-header">
                                                    <!-- <h4>Message</h4> -->
                                                    <!-- <button type="button" class="close" data-dismiss="modal"><span>×</span></button> -->
                                                </div>
                                                <form method="post" action="{{ route('updateQueue') }}">
                                                    @csrf
                                                    @if ($data->isEmpty())
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <P>No data</p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <P>Would you like to procced?</p>
                                                                <input name="id" required type="text" id="id" value="{{ $firstItem->id }}" style="display: none;"></input>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Next Queue</button>
                                                        </div>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal end --> 

                                    <button type="button" class="btn btn-dark btn-lg btn-block" data-toggle="modal" data-target="#Noshow">NO SHOW</button>
                                        <!-- Modal start -->
                                        <div class="modal fade" id="Noshow" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content" id="outprint">
                                                    <div class="modal-header">
                                                        <!-- <h4>Message</h4>
                                                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button> -->
                                                    </div>
                                                    <form method="post" action="{{ route('updateNoShow') }}">
                                                        @csrf
                                                        @if ($data->isEmpty())
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <P>No data</p>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <P>This queue will be marked as 'No show'. Would you like to proceed?</p>
                                                                    <input name="id" required type="text" id="id" value="{{ $firstItem->id }}" style="display: none;"></input>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Next Queue</button>
                                                            </div>
                                                        @endif
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal end --> 

                                        <script src="{{ asset('/js/percentage.js') }}"></script>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <!-- TEXT TO SPEECH -->
                                        <script>
                                                // Kunin ang p-element kung saan mo gustong ilabas ang queue number
                                                var queueNumberElement = document.getElementById('queueNumber');

                                                // Kunin ang button na tatawagin ang queue number
                                                var callButton = document.getElementById('callButton1');

                                                // Kunin ang audio element para sa intro
                                                var introAudio = document.getElementById('introAudio1');

                                                // I-bind ang event handler para sa button click
                                                callButton.addEventListener('click', function() {

                                                    // I-play ang audio intro
                                                    introAudio.play();

                                                    // Kunin ang queue number mula sa p-element
                                                    var queueNumber = queueNumberElement.textContent.replace('Queue number: ', '');

                                                    // Mag-delay ng 2 seconds bago tawagin ang queue number
                                                    setTimeout(function() {
                                                        callQueueNumber(queueNumber);
                                                    }, 2000); // 2000 milliseconds o 2 seconds na delay


                                                    
                                                });

                                                // Function para sa text-to-speech
                                                function callQueueNumber(number) {
                                                    var message = new SpeechSynthesisUtterance('Now serving queue number ' + number + '. Please proceed to registrar.');
                                                    window.speechSynthesis.speak(message);
                                                }
                                            </script>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="grid-col">
                                    <h6>TOTAL SERVED TOKEN</h6>
                                    <label  id="totalQ"><h3>{{$RQ_no}}</h3></label >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="grid-col">
                                    <h6>PERFORMANCE STATUS</h6>
                                    <label  ><h3 id="performance-status"></label >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="grid-col">
                                    <h6>UPCOMING</h6>
                                    <label  ><h3>{{$Rupcoming}}</h3></label >
                                </div>
                            </div>
                            
                        </div>
                        @endif
                    @endif
                @endif

                @if (Auth::user()->role == '2')
                    @if ($qallC == 0)
                        No data
                    @else
                            <!-- CASHIER -->
                        @if (Auth::user()->role == '2')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="grid-col">
                                    <!-- Queue table -->
                                    <div class="single-table">
                                        <div class="table-responsive">
                                            <table class="table text-center" width="50px" height="20px" overflow="auto">
                                                <thead class="text-uppercase bg-primary">
                                                    <tr class="text-white">
                                                        <th scope="col">Queue No</th>
                                                        <th scope="col">Transaction</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if ($dataC->isEmpty())
                                                <tr>
                                                                <td>No item.</td>
                                                            </tr>
                                                @else
                                                    @foreach ($dataC as $key => $item)
                                                        @if ($key > 0 && $key < 6)
                                                            <tr>
                                                                <td>{{ $item->queue_no}}</td>
                                                                <td>{{ $item->transaction }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--End Queue table -->
                                </div>
                            </div>

                            <div class="col-md-4" style="text-align:center;">
                                <div class="grid-col">
                                    <h1>NOW SERVING</h1>
                                    @if ($ServingC->isEmpty())
                                        <h1 class="btn btn-flat btn-info btn-lg btn-block">---</h1>
                                        <h3>FOR ---</h3>
                                    @else
                                        <h1 class="btn btn-flat btn-info btn-lg btn-block" id="queueNumberR" style="font-size: 30px;">{{ $firstItemC->queue_no }}</h1>
                                        <input name="queue_no1" required type="text" id="queue_no" value="{{ $firstItemC->queue_no }}" style="display: none;"></input>
                                        <h3>FOR {{ $firstItemC->transaction }}</h3>

                                        <h4>SERVING TIME:</h4>
                                        <h4 class="text-danger" id="timerLabel">00:00:00</h4>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="grid-col">
                                    <form method="POST" action="{{ route('call-servingQ') }}" id="callForm2">
                                    @csrf 
                                    @if ($ServingC->isEmpty())
                                        <button type="submit" class="btn btn-danger btn-lg btn-block" id="callButton1">RE-CALL</button>
                                    @else
                                        <input name="id" required type="text" id="id" value="{{ $firstItemC->id }}" style="display: none;" ></input>
                                        <button type="submit" class="btn btn-danger btn-lg btn-block" id="callButtonR">RE-CALL</button>
                                    @endif
                                    </form>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>
                                    $(document).ready(function() {
                                        $("form#callForm2").submit(function(event) {
                                            event.preventDefault(); // I-prevent ang default form submission
                                            var idValue = $("#id").val();

                                            $.ajax({
                                                type: 'POST',
                                                url: '/call-servingQ',
                                                data: {
                                                    _token: "{{ csrf_token() }}",
                                                    id: idValue
                                                },
                                                success: function(response) {
                                                    // alert(response.message);
                                                    // setTimeout(function() {
                                                    //     window.close(); // Ito ay para isara ang alert
                                                    // }, 100);
                                                },
                                                error: function() {
                                                    // Kapag may error sa AJAX request
                                                }
                                            });
                                        });
                                    });
                                    </script>

                                        <script src="{{ asset('/js/percentage.js') }}"></script>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <audio id="introAudioR" src="http://127.0.0.1:8000/appimages/bell.wav" preload="auto" style="display: none;"></audio>

                                        
                                        <!-- TEXT TO SPEECH -->
                                            <script>
                                                // Kunin ang p-element kung saan mo gustong ilabas ang queue number
                                                var queueNumberElement = document.getElementById('queueNumberR');

                                                // Kunin ang button na tatawagin ang queue number
                                                var callButton = document.getElementById('callButtonR');

                                                // Kunin ang audio element para sa intro
                                                var introAudio = document.getElementById('introAudioR');

                                                // I-bind ang event handler para sa button click
                                                callButton.addEventListener('click', function() {

                                                    // I-play ang audio intro
                                                    introAudio.play();

                                                    // Kunin ang queue number mula sa p-element
                                                    var queueNumber = queueNumberElement.textContent.replace('Queue number: ', '');

                                                    // Mag-delay ng 2 seconds bago tawagin ang queue number
                                                    setTimeout(function() {
                                                        callQueueNumber(queueNumber);
                                                    }, 2000); // 2000 milliseconds o 2 seconds na delay


                                                    
                                                });

                                                // Function para sa text-to-speech
                                                function callQueueNumber(number) {
                                                    var message = new SpeechSynthesisUtterance('Now serving queue number ' + number + '. Please proceed to cashier.');
                                                    window.speechSynthesis.speak(message);
                                                }

                                                
                                            </script>




                                    <button type="button" class="btn btn-success btn-lg btn-block" id="startButton">START</button>
                                    <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#Next1">NEXT</button>

                                    <!-- Modal start -->
                                    <div class="modal fade" id="Next1" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content" id="outprint">
                                                <div class="modal-header">
                                                    <!-- <h4>Message</h4>
                                                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button> -->
                                                </div>
                                                <form method="post" action="{{ route('updateQueue') }}">
                                                    @csrf
                                                    @if ($dataC->isEmpty())
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <P>No data</p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <P>Would you like to procced?</p>
                                                                <input name="id" required type="text" id="id" value="{{ $firstItemC->id }}"  style="display: none;"></input>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Next Queue</button>
                                                        </div>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal end --> 

                                    <button type="button" class="btn btn-dark btn-lg btn-block" data-toggle="modal" data-target="#Noshow1">NO SHOW</button>
                                        <!-- Modal start -->
                                        <div class="modal fade" id="Noshow1" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content" id="outprint">
                                                    <div class="modal-header">
                                                        <!-- <h4>Message</h4>
                                                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button> -->
                                                    </div>
                                                    <form method="post" action="{{ route('updateNoShow') }}">
                                                        @csrf
                                                        @if ($dataC->isEmpty())
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <P>No data</p>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <P>This queue will be marked as 'No Show'. Would you like to procced?</p>
                                                                    <input name="id" required type="text" id="id" value="{{ $firstItemC->id }}"  style="display: none;" ></input>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Next Queue</button>
                                                            </div>
                                                        @endif
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal end --> 

                                        

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="grid-col">
                                    <h6>TOTAL SERVED TOKEN</h6>
                                    <label  id="totalQ"><h3>{{$CQ_no}}</h3></label >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="grid-col">
                                    <h6>PERFORMANCE STATUS</h6>
                                    <label  ><h3 id="performance-status"></h3></label >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="grid-col">
                                    <h6>UPCOMING</h6>
                                    <label  ><h3>{{$Cupcoming}}</h3></label >
                                </div>
                            </div>
                            
                        </div>
                        @endif                  
                    @endif
                @endif
                
                    


            </div>
        </div>
    </div>
    <!-- Progress Table end -->
</div>
@endsection

@section('customscript')

<!-- REGSTRAR PERFORMANCE -->
<script>
    // I-check ang kundisyon kada 10 minuto (600,000 milliseconds)
    //var checkInterval = 600000;
    var checkInterval = 600000;

    setInterval(function() {
        // I-fetch ang nilalaman ng label na may id "totalQ"
        var totalQueueText = document.getElementById('totalQ').textContent;
        
        // I-convert ito sa integer
        var totalQueueCount = parseInt(totalQueueText);
        
        if (totalQueueCount > 3) {
            // Kung ang totalQueueCount ay higit sa 5, ilagay ang "Excellent" na text sa #performance-status
            document.getElementById('performance-status').textContent = 'Excellent';
        } else {
            // Kung hindi, walang text o i-clear ang #performance-status
            document.getElementById('performance-status').textContent = 'Slow';
        }
    }, checkInterval);
</script>
<!-- REGUSTRAR PERFORMANCE -->


<!-- TIMER -->
<script>
        let timerRunning = false;
        let seconds = 0;
        let timerInterval;

        const startButton = document.getElementById('startButton');
        const timerLabel = document.getElementById('timerLabel');

        startButton.addEventListener('click', function () {
            if (!timerRunning) {
                timerRunning = true;
                startButton.innerText = 'Stop Timer';
                timerInterval = setInterval(updateTimer, 1000);
            } else {
                timerRunning = false;
                startButton.innerText = 'Start Timer';
                clearInterval(timerInterval);
            }
        });

        function updateTimer() {
            seconds++;
            const hours = Math.floor(seconds / 3600);
            const minutes = Math.floor((seconds % 3600) / 60);
            const remainingSeconds = seconds % 60;

            const formattedTime = pad(hours) + ':' + pad(minutes) + ':' + pad(remainingSeconds);
            timerLabel.innerText = formattedTime;
        }

        function pad(val) {
            return val < 10 ? '0' + val : val;
        }
    </script>
@endsection