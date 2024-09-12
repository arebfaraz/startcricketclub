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
                            <li class="menu-item"><a href="#">ABOUT US</a></li>
                            <li class="menu-item"><a href="#">GALLERY</a></li>
                            {{-- <li class="has-children">
                                <a href="javascript:void(0);">Pages</a>
                                <ul class="submenu">
                                    <li><a href="blog.html">blog</a></li>
                                    <li><a href="blog-detail.html">blog
                                            detail </a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="team.html">Team
                                        </a></li>
                                    <li><a href="player-detail.html">Player
                                            Detail</a></li>
                                    <li><a href="match-result.html">Match
                                            Result</a></li>
                                    <li><a href="match-schedule.html">Match
                                            Schedule</a></li>
                                    <li><a href="faq.html">FAQ's</a></li>
                                </ul>
                            </li> --}}
                            <li class="menu-item"><a href="#">TOURNAMENTS</a></li>
                            <li class="menu-item"><a href="#">CONTACT US</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-end" id="navbar-right">
                    {{-- <form action="https://uiparadox.co.uk/templates/cricket-pulse/v2/index.html"
                        class="input-group search-bar">
                        <input type="text" placeholder="Search..." required>
                        <button class="search" type="submit"><i class="far fa-search search-icon"></i></button>
                    </form> --}}

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
                <a class="navbar-brand" href="{{ route('home') }}"><img alt src="{{ asset('front/img/logo.png') }}"></a>
            </div>
            <div class="hamburger-menu">
                <div class="bar"></div>
            </div>
        </div>
        <nav class="mobile-navar d-xl-none">
            <ul>
                <li><a href="{{ route('home') }}" class="active">Home</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#">Gallery</a></li>
                {{-- <li class="has-children">Pages <span class="icon-arrow"></span>
                    <ul class="children">
                        <li><a href="blog.html">blog</a></li>
                        <li><a href="blog-detail.html">blog detail
                            </a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="team.html">Team </a></li>
                        <li><a href="player-detail.html">Player
                                Detail</a></li>
                        <li><a href="match-result.html">Match Result</a></li>
                        <li><a href="match-schedule.html">Match
                                Schedule</a></li>
                        <li><a href="faq.html">FAQ's</a></li>
                    </ul>
                </li> --}}
                <li><a href="#">TOURNAMENTS</a></li>
                <li><a href="#">CONTACT US</a></li>
            </ul>
        </nav>
    </div>
</header>
