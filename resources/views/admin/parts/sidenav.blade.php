
 
 <div class="sidebar-menu" style="background-color:#000435;">
            <div class="sidebar-header" style="background-color:#000435;">
                <div class="logo" style="background-color:#000435;">
                    <a href="{{ route('admin') }}"><img class="card-img-top img-fluid" src="http://127.0.0.1:8000/appimages/events/logo1.jpg" alt="image"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner" >
                    <nav class="sidebar" >
                        <ul class="metismenu" id="menu" >
                            @if (Auth::user()->role == '2')
                                <li class="nav-item"><a href="{{ route('admin') }}" style="background-color:#000435;"><i class="ti-home"></i> <span>Dashboard</span></a></li>
                                <li class="nav-item"><a href="{{ route('registrar_queue') }}" style="background-color:#000435;"><i class="ti-time"></i> <span>Queue</span></a></li>
                                <li class="nav-item"><a href="{{ route('registrar_reports') }}" style="background-color:#000435;"><i class="ti-clipboard"></i> <span>Reports</span></a></li>
                            @endif
                            @if (Auth::user()->role == '1')
                            <li class="nav-item"><a href="{{ route('admin') }}" style="background-color:#000435;"><i class="ti-home"></i> <span>Dashboard</span></a></li>
                            <li class="nav-item"><a href="{{ route('registrar_queue') }}" style="background-color:#000435;"><i class="ti-time" ></i> <span>Queue</span></a></li>
                            <li class="nav-item"><a href="{{ route('registrar_reports') }}" style="background-color:#000435;"><i class="ti-clipboard" ></i> <span>Reports</span></a></li>
                            <li class="nav-item"><a href="{{ route('registrar_display') }}" style="background-color:#000435;"><i class="ti-video-clapper" ></i> <span>Live Monitor</span></a></li>
                            <li class="nav-item"><a href="{{ route('registrar_user') }}" style="background-color:#000435;"><i class="ti-user" ></i> <span>Users</span></a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>