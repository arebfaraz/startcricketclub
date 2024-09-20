<header class="large-screens" id="navbar_top">
    <div class="container">
        <nav class="navbar navbar-expand-lg p-0">
            <div class="collapse navbar-collapse justify-content-center" id="mynavbar">
                <div class="col-lg-8 d-flex justify-content-center">
                    <div class="left-nav">
                        <a href="{{ route('home') }}" class="navbar-brand m-0 p-0" id="navbar-logo">
                            <img alt src="{{ asset('front/img/logo.png') }}">
                        </a>
                        <ul class="navbar-nav m-0 py-2">
                            <li class="menu-item">
                                <a href="{{ route('home') }}"
                                    class="{{ Request::routeIs('home') ? 'active' : '' }}">Home
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('about') }}"
                                    class="{{ Request::routeIs('about') ? 'active' : '' }}">ABOUT US
                                </a>
                            </li>
                            <li class="menu-item"><a href="{{ route('galleries') }}"
                                    class="{{ Request::routeIs('galleries') ? 'active' : '' }}">GALLERY</a></li>
                            <li class="menu-item"><a href="{{ route('upcomingMatches') }}"
                                    class="{{ Request::routeIs('upcomingMatches') ? 'active' : '' }}">Match Schedule</a>
                            </li>
                            <li class="menu-item"><a href="{{ route('contact') }}"
                                    class="{{ Request::routeIs('contact') ? 'active' : '' }}">CONTACT US</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-end" id="navbar-right">
                    <a href="{{ route('membership') }}" class="cus-btn sec">Join Membership
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>

<header class="small-screen" id="navbar_top_small">
    <div class="container-fluid">
        <div class="mobile-menu">
            <div>
                <a class="navbar-brand" href="{{ route('home') }}"><img alt
                        src="{{ asset('front/img/logo.png') }}"></a>
            </div>
            <div class="hamburger-menu">
                <div class="bar"></div>
            </div>
        </div>
        <nav class="mobile-navar d-xl-none">
            <ul>
                <li><a href="{{ route('home') }}" class="{{ Request::routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="{{ Request::routeIs('about') ? 'active' : '' }}">ABOUT
                        US</a></li>
                <li><a href="{{ route('galleries') }}"
                        class="{{ Request::routeIs('galleries') ? 'active' : '' }}">Gallery</a></li>
                <li><a href="{{ route('upcomingMatches') }}"
                        class="{{ Request::routeIs('upcomingMatches') ? 'active' : '' }}">Match Schedule</a></li>
                <li><a href="{{ route('contact') }}" class="{{ Request::routeIs('contact') ? 'active' : '' }}">CONTACT
                        US</a></li>
            </ul>
        </nav>
    </div>
</header>
