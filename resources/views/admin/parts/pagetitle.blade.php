<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">

        @yield('pagetitle')

        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{ asset('assets/images/author/avatar.png') }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Profile Settings</a>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                       Signout 
                      </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>