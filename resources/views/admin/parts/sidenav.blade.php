<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="{{ route('admin') }}" class="nav-link">
                <div class="nav-profile-image">
                    <img src="assets/images/faces/face1.jpg" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                    <span class="text-secondary text-small">Administrator</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#eventmodule" aria-expanded="false"
                aria-controls="eventmodule">
                <span class="menu-title">Events</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-calendar-multiple menu-icon"></i>
            </a>
            <div class="collapse" id="eventmodule">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">List of Events</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Create Event</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Event
                            Notification</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#stationmodule" aria-expanded="false"
                aria-controls="stationmodule">
                <span class="menu-title">Stations</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-home-map-marker menu-icon"></i>
            </a>
            <div class="collapse" id="stationmodule">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Create Stations</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Assign
                            Stations</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#paymentmodule" aria-expanded="false"
                aria-controls="paymentmodule">
                <span class="menu-title">Payment</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-cash-multiple menu-icon"></i>
            </a>
            <div class="collapse" id="paymentmodule">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Membership
                            Applications</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Event
                            Applications</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Payment
                            Notification</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ridermodule" aria-expanded="false"
                aria-controls="ridermodule">
                <span class="menu-title">Riders</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-checkbox-marked-outline menu-icon"></i>
            </a>
            <div class="collapse" id="ridermodule">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Riders List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Rider
                            Notification</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#attendancemodule" aria-expanded="false"
                aria-controls="attendancemodule">
                <span class="menu-title">Attendance</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-checkbox-marked-outline menu-icon"></i>
            </a>
            <div class="collapse" id="attendancemodule">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Participation</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Event
                            Applications</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#usermodule" aria-expanded="false"
                aria-controls="usermodule">
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-multiple-outline menu-icon"></i>
            </a>
            <div class="collapse" id="usermodule">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">User List</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">New User</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span class="menu-title">Backup and Restore</span>
                <i class="mdi mdi-backup-restore menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
