<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <img src="{{ asset('front/img/logo.png') }}" alt="navbar brand" class="navbar-brand" />
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
                <li class="nav-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>

                </li>
                <li class="nav-item {{ Request::routeIs('team.*') ? 'active' : '' }}">
                    <a href="{{ route('team.index') }}">
                        <i class="fas fa-layer-group"></i>
                        <p>Team</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::routeIs('player.*') ? 'active' : '' }}">
                    <a href="{{ route('player.index') }}">
                        <i class="fas fa-users"></i>
                        <p>Players</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::routeIs('membership.*') ? 'active' : '' }}">
                    <a href="{{ route('membership.index') }}">
                        <i class="fas fa-users"></i>
                        <p>Membership</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::routeIs('upcoming-match.*') ? 'active' : '' }}">
                    <a href="{{ route('upcoming-match.index') }}">
                        <i class="fas fa-baseball-ball"></i>
                        <p>Upcoming Match</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::routeIs('match-result.*') ? 'active' : '' }}">
                    <a href="{{ route('match-result.index') }}">
                        <i class="fas fa-trophy"></i>
                        <p>Match Result</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::routeIs('slider.*') ? 'active' : '' }}">
                    <a href="{{ route('slider.index') }}">
                        <i class="fas fa-sliders-h"></i>
                        <p>Slider</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::routeIs('gallery.*') ? 'active' : '' }}">
                    <a href="{{ route('gallery.index') }}">
                        <i class="fas fa-images"></i>
                        <p>Gallery</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::routeIs('blog.*') ? 'active' : '' }}">
                    <a href="{{ route('blog.index') }}">
                        <i class="fab fa-blogger-b"></i>
                        <p>Blog</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
