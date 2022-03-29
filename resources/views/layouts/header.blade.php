<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar  static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name ?? "Guest" }}</span>
            <img class="img-profile rounded-circle"
                src="{{ asset('template/img/undraw_profile.svg') }}">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{ route('auth.logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
            <form id="frm-logout" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </li>

</ul>

</nav>
<!-- End of Topbar -->