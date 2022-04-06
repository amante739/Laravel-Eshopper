<ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fa fa-globe"></i> &nbsp;<span><b>View Website</b></span>
        </a>

    </li>
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <span><b>Admin</b> &nbsp;</span><i class="fas fa-arrow-circle-down"></i>
        </a>
        
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <a class="dropdown-item" href="">Profile</a>
            <a class="dropdown-item" href="">Change Password</a>
            <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Log Out') }}
            </a>
            <form class="dropdown-item" id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>

    </li>
</ul>
