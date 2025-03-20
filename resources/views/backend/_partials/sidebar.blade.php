<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="{{ url('backend/assets/img/kaiadmin/logo_light.svg') }}" 
                     alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('user*') ? 'active' : '' }}">
                    <a href="{{ route('user') }}">
                        <i class="fas fa-users"></i>
                        <p>Data User</p>
                        <span class="badge badge-success"></span>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('students*') ? 'active' : '' }}">
                    <a href="{{ route('students') }}">
                        <i class="fas fa-user-graduate"></i>
                        <p>Data Siswa</p>
                        <span class="badge badge-success"></span>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('teachers*') ? 'active' : '' }}">
                    <a href="{{ route('teachers') }}">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <p>Teachers</p>
                        <span class="badge badge-success"></span>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('mapel*') ? 'active' : '' }}">
                    <a href="{{ route('mapel') }}">
                        <i class="fas fa-book"></i>
                        <p>Data Mata Pelajaran</p>
                        <span class="badge badge-success"></span>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('nilai*') ? 'active' : '' }}">
                    <a href="{{ route('nilai') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Data Nilai</p>
                        <span class="badge badge-success"></span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('pendaftaran*') ? 'active' : '' }}">
                    <a href="{{ route('pendaftaran') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Data Pendaftaran</p>
                        <span class="badge badge-success"></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
