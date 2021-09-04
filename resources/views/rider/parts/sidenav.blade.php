 <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="{{ route('admin') }}"><h1 style="color: white">CR1M</h1></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav class="sidebar">
                        <ul class="metismenu" id="menu">
                            <li class="nav-item"><a href="{{ route('admin') }}"><i class="fa fa-institution"></i> <span>Dashboard</span></a></li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" aria-expanded="false"><i class="ti-calendar"></i><span>Events</span></a>
                                <ul class="collapse sub-menu">
                                    <li class="nav-item"><a href="{{ route('eventsList') }}">List of Events</a></li>
                                    <li class="nav-item"><a href="{{ route('createEvent') }}">Create Event</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-credit-card"></i><span>Payment</span></a>
                                <ul class="collapse">
                                    <li><a href="barchart.html">Membership Applications</a></li>
                                    <li><a href="linechart.html">Event Applications</a></li>
                                    <li><a href="piechart.html">Payment Notification</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-users"></i><span>Riders</span></a>
                                <ul class="collapse sub-menu">
                                    <li class="nav-item"><a href="{{ route('userRiderList') }}">Riders List</a></li>
                                    <li class="nav-item"><a href="themify.html">Rider Groups</a></li>
                                </ul>
                            </li>
                            <li></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>