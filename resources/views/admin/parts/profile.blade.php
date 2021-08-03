{{-- Profile Dropdown --}}
<ul id="dropdown1" class="dropdown-content">
    <li><a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>
    </li>
    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
    </li>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <li>

            <a href="route('logout')" onclick="event.preventDefault();
            this.closest('form').submit();">
                <i class="fa fa-sign-out fa-fw"></i> Logout
            </a>

        </li>
    </form>
</ul>
