@extends('layouts.app')

@section('content')
    <!-- Hero Banner start -->
    @if ($slider->is_stream)
        <iframe class="youtube-video" src="{{ $slider->link }}?autoplay=1&mute=1" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
        </iframe>

        {{-- <iframe src="{{ $slider->link }}" class="youtube-video" frameborder="0"></iframe> --}}
    @else
        <div class="hero-banner-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="content">
                            <h1 class="mb-12 light-black">{{ $slider->title }}</h1>
                            <p class="mb-32 light-black">{{ $slider->description }}</p>
                            <div class="btn-block">
                                <a href="{{ route('membership') }}" class="cus-btn primary">Join Now
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                        viewBox="0 0 24 25" fill="none">
                                        <g clip-path="url(#clip0_925_427)">
                                            <path
                                                d="M19.8739 8.48103C19.5301 8.48103 19.2038 8.55711 18.9102 8.69234C18.675 7.66583 17.7549 6.8975 16.658 6.8975C16.3065 6.8975 15.9733 6.97667 15.6748 7.11762C15.4113 6.13128 14.5103 5.40252 13.442 5.40252C13.121 5.40252 12.8152 5.46842 12.5371 5.5872V2.81113C12.5372 1.53673 11.5004 0.5 10.226 0.5C8.95165 0.5 7.91486 1.53673 7.91486 2.81113V13.8079L6.72321 12.0389L6.70455 12.0157C5.81233 10.9066 4.24263 10.6601 3.05346 11.4425C2.43161 11.8516 2.01035 12.4791 1.86719 13.2095C1.72493 13.9354 1.87544 14.671 2.29099 15.2823L6.54391 21.9861L6.55807 22.0076C7.63001 23.5682 9.40033 24.5 11.2937 24.5H16.0657C19.4399 24.5 22.1851 21.7549 22.1851 18.3807V10.7921C22.1851 9.51777 21.1483 8.48103 19.8739 8.48103ZM20.7788 18.3807C20.7788 20.9795 18.6646 23.0938 16.0657 23.0938H11.2937C9.86786 23.0938 8.53451 22.3941 7.72432 21.2216L3.47201 14.5188L3.45785 14.4974C3.25211 14.1978 3.17735 13.8365 3.24719 13.4799C3.31708 13.1234 3.52277 12.817 3.82633 12.6173C4.39938 12.2403 5.15351 12.3527 5.59183 12.8765L9.32111 18.4123V2.81113C9.32111 2.31214 9.72705 1.90625 10.226 1.90625C10.725 1.90625 11.1309 2.31214 11.1309 2.81113V11.1528H12.5372V7.71369C12.5372 7.2147 12.9431 6.80881 13.442 6.80881C13.941 6.80881 14.3469 7.2147 14.3469 7.71369V11.1528H15.7532V9.20862C15.7532 8.70964 16.1591 8.30375 16.658 8.30375C17.157 8.30375 17.5629 8.70964 17.5629 9.20862V11.1528H18.9692V10.7922C18.9692 10.2932 19.3751 9.88728 19.874 9.88728C20.373 9.88728 20.7789 10.2932 20.7789 10.7922V18.3807H20.7788Z"
                                                fill="#F8F8FF" />
                                        </g>
                                        <defs>
                                            <clippath id="clip0_925_427">
                                                <rect width="24" height="24" fill="white"
                                                    transform="translate(0 0.5)" />
                                            </clippath>
                                        </defs>
                                    </svg>
                                </a>
                                <div class="overlay d-md-inline-block" data-bs-toggle="modal" data-bs-target="#videoModal">
                                    <a href="#"
                                        class="play-button fw-600
                                            fs-25">
                                        <div class="icon"><i class="fas fa-play"></i></div>
                                        Watch Video
                                    </a>
                                </div>
                                <!-- <a href="signup.html" class="cus-btn primary">Join Now<i class="fas fa-chevron-right"></i></a> -->
                                <!-- <a href="blogs.html" class="cus-btn sec">Read More<i class="far fa-book-open"></i></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner-image">
                            <img src="{{ asset('storage/slider_images/' . $slider->image) }}" alt>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif
    <!-- Hero Banner End -->
    <!-- Brands Start -->

    <div class="brands p-40">
        <div class="container">
            <div class="brands-logo">
                @foreach ($teams as $team)
                    <div class="logo">
                        <img class="shadow-sm p-3 mb-5 bg-body rounded"
                            src="{{ asset('storage/team_logos/' . $team->logo) }}" alt>
                    </div>
                @endforeach
                @foreach ($teams as $team)
                    <div class="logo">
                        <img class="shadow-sm p-3 mb-5 bg-body rounded"
                            src="{{ asset('storage/team_logos/' . $team->logo) }}" alt>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Brands End -->

    <!-- Main Content Start -->
    <div class="page-content">

        <!-- Match Results Start -->
        <section class="match-results p-40">
            <div class="container">
                <div class="heading">
                    <div class="left">
                        <h2 class="light-black">Last Match Result</h2>
                        <p class="light-black">Our vision is to elevate cricket in Cambodia from schools, <br>
                            colleges, and local levels to the international stage.
                        </p>
                    </div>
                    <a href="{{ route('matchResults') }}" class="cus-btn primary">See All
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                            fill="none">
                            <g clip-path="url(#clip0_925_428)">
                                <path
                                    d="M19.8739 8.48103C19.5301 8.48103 19.2038 8.55711 18.9102 8.69234C18.675 7.66583 17.7549 6.8975 16.658 6.8975C16.3065 6.8975 15.9733 6.97667 15.6748 7.11762C15.4113 6.13128 14.5103 5.40252 13.442 5.40252C13.121 5.40252 12.8152 5.46842 12.5371 5.5872V2.81113C12.5372 1.53673 11.5004 0.5 10.226 0.5C8.95165 0.5 7.91486 1.53673 7.91486 2.81113V13.8079L6.72321 12.0389L6.70455 12.0157C5.81233 10.9066 4.24263 10.6601 3.05346 11.4425C2.43161 11.8516 2.01035 12.4791 1.86719 13.2095C1.72493 13.9354 1.87544 14.671 2.29099 15.2823L6.54391 21.9861L6.55807 22.0076C7.63001 23.5682 9.40033 24.5 11.2937 24.5H16.0657C19.4399 24.5 22.1851 21.7549 22.1851 18.3807V10.7921C22.1851 9.51777 21.1483 8.48103 19.8739 8.48103ZM20.7788 18.3807C20.7788 20.9795 18.6646 23.0938 16.0657 23.0938H11.2937C9.86786 23.0938 8.53451 22.3941 7.72432 21.2216L3.47201 14.5188L3.45785 14.4974C3.25211 14.1978 3.17735 13.8365 3.24719 13.4799C3.31708 13.1234 3.52277 12.817 3.82633 12.6173C4.39938 12.2403 5.15351 12.3527 5.59183 12.8765L9.32111 18.4123V2.81113C9.32111 2.31214 9.72705 1.90625 10.226 1.90625C10.725 1.90625 11.1309 2.31214 11.1309 2.81113V11.1528H12.5372V7.71369C12.5372 7.2147 12.9431 6.80881 13.442 6.80881C13.941 6.80881 14.3469 7.2147 14.3469 7.71369V11.1528H15.7532V9.20862C15.7532 8.70964 16.1591 8.30375 16.658 8.30375C17.157 8.30375 17.5629 8.70964 17.5629 9.20862V11.1528H18.9692V10.7922C18.9692 10.2932 19.3751 9.88728 19.874 9.88728C20.373 9.88728 20.7789 10.2932 20.7789 10.7922V18.3807H20.7788Z"
                                    fill="#F8F8FF" />
                            </g>
                            <defs>
                                <clippath id="clip0_925_428">
                                    <rect width="24" height="24" fill="white" transform="translate(0 0.5)" />
                                </clippath>
                            </defs>
                        </svg>
                    </a>
                </div>
                <div class="result-slider">
                    @foreach ($results as $result)
                        <div class="result-block">
                            <div class="item">
                                <div class="teams">
                                    <div class="team">
                                        <div class="team-logo-name">
                                            <img src="{{ asset('storage/team_logos/' . $result->team_1->logo) }}" alt>
                                            <h5 class="light-black">{{ @$result->team_1->name }}</h5>
                                        </div>
                                        <h5 class="light-black">{{ $result->team_1_score . '/' . $result->team_1_wicket }}
                                            <span class="dark-gray">({{ $result->team_1_over }})</span>
                                        </h5>
                                    </div>
                                    <div class="team">
                                        <h5 class="light-black">{{ $result->team_2_score . '/' . $result->team_2_wicket }}
                                            <span class="dark-gray">({{ $result->team_2_over }})</span>
                                        </h5>
                                        <div class="team-logo-name">
                                            <img src="{{ asset('storage/team_logos/' . $result->team_2->logo) }}" alt>
                                            <h5 class="light-black">{{ @$result->team_2->name }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="text-center dark-gray">
                                    {{ @$result->won_team->name . ' won by ' . $result->won_by_no }}
                                    {{ $result->won_by == '1' ? 'Run' : 'Wicket' }}
                                </h5>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="result-block">
                        <div class="item">

                            <div class="teams">
                                <div class="team">
                                    <div class="team-logo-name">
                                        <img src="{{ asset('front/img/brands/logo.png') }}" alt>
                                        <h5 class="light-black">Derbyshire</h5>
                                    </div>
                                    <h5 class="light-black">164 <span class="dark-gray">(42)</span></h5>
                                </div>
                                <div class="team">
                                    <h5 class="light-black">165/5 <span class="dark-gray">(39)</span></h5>
                                    <div class="team-logo-name">
                                        <img src="{{ asset('front/img/brands/knights_Cricket_logo.png') }}" alt>
                                        <h5 class="light-black">Kinghts</h5>
                                    </div>
                                </div>
                            </div>
                            <h5 class="text-center dark-gray">Kinghts
                                won by 5 wickets (66 balls left)</h5>
                        </div>
                    </div>
                    <div class="result-block">
                        <div class="item">
                            <div class="teams">
                                <div class="team">
                                    <div class="team-logo-name">
                                        <img src="{{ asset('front/img/brands/action_cricket_logo.png') }}" alt>
                                        <h5 class="light-black">Action
                                            Cricket</h5>
                                    </div>
                                    <h5 class="light-black">184/6 <span class="dark-gray">(42)</span></h5>
                                </div>
                                <div class="team">
                                    <h5 class="light-black">180/5 <span class="dark-gray">(39)</span></h5>
                                    <div class="team-logo-name">
                                        <img src="{{ asset('front/img/brands/knights_Cricket_logo.png') }}" alt>
                                        <h5 class="light-black">Kinghts</h5>
                                    </div>
                                </div>
                            </div>
                            <h5 class="text-center dark-gray">Action
                                Cricket won by 4 wickets (48 balls left)</h5>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <!-- Match Results End -->

        <!-- Achievements Start -->
        <section class="achievement">
            <div class="celebrattion-image">
                <img src="front/img/achievement/celebration-image.png" alt>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-6">
                        <div class="p-40">
                            <h3 class="light-black mb-24">Star Cricket Club
                                Story, Beyond the Boundary</h3>
                            <ul class="list-group mb-4">
                                <li class="list-group-item">
                                    <img src="{{ asset('front/img/right-arrow.png') }}" alt=""> We are
                                    officially registered with the Cricket
                                    Federation of Cambodia and proudly
                                    operate the first dedicated and fully equipped cricket ground in Phnom Penh. Our vision
                                    is to advance cricket in Cambodia from schools, colleges, and universities to the
                                    international stage. We aim to support and develop both expatriate and local young
                                    talent.
                                </li>
                                <li class="list-group-item"><img src="{{ asset('front/img/right-arrow.png') }}"
                                        alt=""> Register with us to play every weekend.</li>
                                <li class="list-group-item"><img src="{{ asset('front/img/right-arrow.png') }}"
                                        alt=""> Our Cambodian players also have the opportunity to join the
                                    national team.</li>
                                <li class="list-group-item"><img src="{{ asset('front/img/right-arrow.png') }}"
                                        alt=""> Become a member of Star Cricket Club. Click below to join
                                </li>
                            </ul>
                            <a href="/membership" class="cus-btn primary">Join now
                                <i class="fal fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="achievement-content ">
                    <div class="title light-black">ACHIEVEMENTS</div>
                    <div class="achievements">
                        <div class="content text-center">
                            <h2>100+</h2>
                            <h6 class="lightest-gray">Team Members</h6>
                        </div>
                        <div class="content text-center">
                            <h2>120+</h2>
                            <h6 class="lightest-gray">Tournament
                                Victories</h6>
                        </div>
                        <div class="content text-center">
                            <h2>20+</h2>
                            <h6 class="lightest-gray">Hosting Major
                                Events</h6>
                        </div>
                        <div class="content text-center">
                            <h2>100%</h2>
                            <h6 class="lightest-gray">Satisfaction Rate</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Achievements End -->

        <!-- Match list Start -->
        @if (count($upcomingMatches) > 0)
            <section class="match-list p-40">
                <div class="container">
                    <div class="heading">
                        <div class="left">
                            <h2 class="light-black">Upcoming Match List</h2>
                            <p class="light-black">Our vision is to elevate cricket in Cambodia from schools, <br>
                                colleges, and local levels to the international stage.
                            </p>
                        </div>
                        <a href="{{ route('upcomingMatches') }}" class="cus-btn primary">See All
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                                fill="none">
                                <g clip-path="url(#clip0_925_429)">
                                    <path
                                        d="M19.8739 8.48103C19.5301 8.48103 19.2038 8.55711 18.9102 8.69234C18.675 7.66583 17.7549 6.8975 16.658 6.8975C16.3065 6.8975 15.9733 6.97667 15.6748 7.11762C15.4113 6.13128 14.5103 5.40252 13.442 5.40252C13.121 5.40252 12.8152 5.46842 12.5371 5.5872V2.81113C12.5372 1.53673 11.5004 0.5 10.226 0.5C8.95165 0.5 7.91486 1.53673 7.91486 2.81113V13.8079L6.72321 12.0389L6.70455 12.0157C5.81233 10.9066 4.24263 10.6601 3.05346 11.4425C2.43161 11.8516 2.01035 12.4791 1.86719 13.2095C1.72493 13.9354 1.87544 14.671 2.29099 15.2823L6.54391 21.9861L6.55807 22.0076C7.63001 23.5682 9.40033 24.5 11.2937 24.5H16.0657C19.4399 24.5 22.1851 21.7549 22.1851 18.3807V10.7921C22.1851 9.51777 21.1483 8.48103 19.8739 8.48103ZM20.7788 18.3807C20.7788 20.9795 18.6646 23.0938 16.0657 23.0938H11.2937C9.86786 23.0938 8.53451 22.3941 7.72432 21.2216L3.47201 14.5188L3.45785 14.4974C3.25211 14.1978 3.17735 13.8365 3.24719 13.4799C3.31708 13.1234 3.52277 12.817 3.82633 12.6173C4.39938 12.2403 5.15351 12.3527 5.59183 12.8765L9.32111 18.4123V2.81113C9.32111 2.31214 9.72705 1.90625 10.226 1.90625C10.725 1.90625 11.1309 2.31214 11.1309 2.81113V11.1528H12.5372V7.71369C12.5372 7.2147 12.9431 6.80881 13.442 6.80881C13.941 6.80881 14.3469 7.2147 14.3469 7.71369V11.1528H15.7532V9.20862C15.7532 8.70964 16.1591 8.30375 16.658 8.30375C17.157 8.30375 17.5629 8.70964 17.5629 9.20862V11.1528H18.9692V10.7922C18.9692 10.2932 19.3751 9.88728 19.874 9.88728C20.373 9.88728 20.7789 10.2932 20.7789 10.7922V18.3807H20.7788Z"
                                        fill="#F8F8FF" />
                                </g>
                                <defs>
                                    <clippath id="clip0_925_429">
                                        <rect width="24" height="24" fill="white"
                                            transform="translate(0 0.5)" />
                                    </clippath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                    <div class="list-block">
                        @foreach ($upcomingMatches as $match)
                            <div class="list-item">
                                <div class="teams-location">
                                    <div class="teams">
                                        <div class="team-logo-name">
                                            <img src="{{ asset('storage/team_logos/' . $match->team_1->logo) }}" alt>
                                            <h5 class="light-black">{{ $match->team_1->name }}</h5>
                                        </div>
                                        <h5 class="light-black">Vs</h5>
                                        <div class="team-logo-name">
                                            <img src="{{ asset('storage/team_logos/' . $match->team_2->logo) }}" alt>
                                            <h5 class="light-black">{{ $match->team_2->name }}</h5>
                                        </div>
                                    </div>
                                    <div class="location">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <h6 class="light-black">{{ $match->location }}</h6>
                                    </div>
                                </div>
                                <div class="timing">
                                    <h6 class="light-black">{{ $match->type }}</h6>
                                    <a href="#"
                                        class="cus-btn primary">{{ \Carbon\Carbon::createFromFormat('H:i:s', $match->time)->format('h:i A') }}
                                        <i class="fal fa-clock"></i>
                                    </a>
                                    <h6 class="light-black">{{ \Carbon\Carbon::parse($match->date)->format('d M, Y') }}
                                    </h6>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>
        @endif

        <!-- Match list End -->

        <!-- Big match Start -->
        @if ($upcomingMatches->first())
            @php
                $bigMatch = $upcomingMatches->first();
            @endphp
            <section class="big-match ">
                <div class="match-name">
                    <div class="container">
                        <div class="vector">
                            <img src="front/img/vs.png" alt>
                        </div>
                        <div class="content row">
                            <span class="col-5 text-center">{{ $bigMatch->team_1->name }}</span>
                            <span class="col-2"></span>
                            <span class="col-5 text-center">{{ $bigMatch->team_2->name }}</span>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="match-detail">
                        <img src="{{ asset('storage/team_logos/' . $bigMatch->team_1->logo) }}" alt>
                        <div class="detail">
                            <h3 class="text-center color-white mb-24">
                                {{ \Carbon\Carbon::parse($bigMatch->date)->format('d F Y') }}</h3>
                            <h4 class="text-center color-white">{{ $bigMatch->location }}</h4>
                        </div>
                        <img src="{{ asset('storage/team_logos/' . $bigMatch->team_2->logo) }}" alt>
                    </div>
                </div>
            </section>
        @endif

        <!-- Big match End -->

        <!-- Gallery Start -->
        <section class="gallery p-40">
            <div class="container">
                <div class="heading">
                    <div class="left">
                        <h2 class="light-black">Our Latest Gallery</h2>
                        <p class="light-black">Our vision is to elevate cricket in Cambodia from schools, <br>
                            colleges, and local levels to the international stage.
                        </p>
                    </div>
                    <a href="#" class="cus-btn primary">See All
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                            fill="none">
                            <g clip-path="url(#clip0_925_430)">
                                <path
                                    d="M19.8739 8.48103C19.5301 8.48103 19.2038 8.55711 18.9102 8.69234C18.675 7.66583 17.7549 6.8975 16.658 6.8975C16.3065 6.8975 15.9733 6.97667 15.6748 7.11762C15.4113 6.13128 14.5103 5.40252 13.442 5.40252C13.121 5.40252 12.8152 5.46842 12.5371 5.5872V2.81113C12.5372 1.53673 11.5004 0.5 10.226 0.5C8.95165 0.5 7.91486 1.53673 7.91486 2.81113V13.8079L6.72321 12.0389L6.70455 12.0157C5.81233 10.9066 4.24263 10.6601 3.05346 11.4425C2.43161 11.8516 2.01035 12.4791 1.86719 13.2095C1.72493 13.9354 1.87544 14.671 2.29099 15.2823L6.54391 21.9861L6.55807 22.0076C7.63001 23.5682 9.40033 24.5 11.2937 24.5H16.0657C19.4399 24.5 22.1851 21.7549 22.1851 18.3807V10.7921C22.1851 9.51777 21.1483 8.48103 19.8739 8.48103ZM20.7788 18.3807C20.7788 20.9795 18.6646 23.0938 16.0657 23.0938H11.2937C9.86786 23.0938 8.53451 22.3941 7.72432 21.2216L3.47201 14.5188L3.45785 14.4974C3.25211 14.1978 3.17735 13.8365 3.24719 13.4799C3.31708 13.1234 3.52277 12.817 3.82633 12.6173C4.39938 12.2403 5.15351 12.3527 5.59183 12.8765L9.32111 18.4123V2.81113C9.32111 2.31214 9.72705 1.90625 10.226 1.90625C10.725 1.90625 11.1309 2.31214 11.1309 2.81113V11.1528H12.5372V7.71369C12.5372 7.2147 12.9431 6.80881 13.442 6.80881C13.941 6.80881 14.3469 7.2147 14.3469 7.71369V11.1528H15.7532V9.20862C15.7532 8.70964 16.1591 8.30375 16.658 8.30375C17.157 8.30375 17.5629 8.70964 17.5629 9.20862V11.1528H18.9692V10.7922C18.9692 10.2932 19.3751 9.88728 19.874 9.88728C20.373 9.88728 20.7789 10.2932 20.7789 10.7922V18.3807H20.7788Z"
                                    fill="#F8F8FF" />
                            </g>
                            <defs>
                                <clippath id="clip0_925_430">
                                    <rect width="24" height="24" fill="white" transform="translate(0 0.5)" />
                                </clippath>
                            </defs>
                        </svg>
                    </a>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12 mb-24">
                        <div class="img-block br-20 shadow">
                            <img src="front/img/gallery/img-1.png" alt>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-24">
                        <div class="img-block br-20 shadow">
                            <img src="front/img/gallery/img-2.png" alt>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-24">
                        <div class="img-block br-20 shadow">
                            <img src="front/img/gallery/img-3.png" alt>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-24 mb-lg-0">
                        <div class="img-block br-20 shadow">
                            <img src="front/img/gallery/img-4.png" alt>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-24 mb-lg-0">
                        <div class="img-block br-20 shadow">
                            <img src="front/img/gallery/img-5.png" alt>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 mb-0">
                        <div class="img-block br-20 shadow">
                            <img src="front/img/gallery/img-6.png" alt>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Gallery End -->

        <!-- join Start -->
        <section class="join m-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 offset-lg-6">
                        <div class="content">
                            <h2 class="color-white text-xl-center">Ready to
                                Play? Join Now!</h2>
                            <h5 class="color-white text-xl-center">ur vision is to elevate cricket in Cambodia from
                                schools,
                                colleges, and local levels to the international stage.</h5>
                            <a href="{{ route('membership') }}" class="cus-btn sec">Join Now
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M19.8739 7.98103C19.5301 7.98103 19.2038 8.05711 18.9102 8.19234C18.675 7.16583 17.7549 6.3975 16.658 6.3975C16.3065 6.3975 15.9733 6.47667 15.6748 6.61762C15.4113 5.63128 14.5103 4.90252 13.442 4.90252C13.121 4.90252 12.8152 4.96842 12.5371 5.0872V2.31113C12.5372 1.03673 11.5004 0 10.226 0C8.95165 0 7.91486 1.03673 7.91486 2.31113V13.3079L6.72321 11.5389L6.70455 11.5157C5.81233 10.4066 4.24263 10.1601 3.05346 10.9425C2.43161 11.3516 2.01035 11.9791 1.86719 12.7095C1.72493 13.4354 1.87544 14.171 2.29099 14.7823L6.54391 21.4861L6.55807 21.5076C7.63 23.0682 9.40033 24 11.2937 24H16.0657C19.4399 24 22.1851 21.2549 22.1851 17.8807V10.2921C22.1851 9.01777 21.1483 7.98103 19.8739 7.98103ZM20.7788 17.8807C20.7788 20.4795 18.6646 22.5938 16.0657 22.5938H11.2937C9.86786 22.5938 8.53451 21.8941 7.72432 20.7216L3.47201 14.0188L3.45785 13.9974C3.25211 13.6978 3.17735 13.3365 3.24719 12.9799C3.31708 12.6234 3.52277 12.317 3.82633 12.1173C4.39938 11.7403 5.15351 11.8527 5.59183 12.3765L9.32111 17.9123V2.31113C9.32111 1.81214 9.72705 1.40625 10.226 1.40625C10.725 1.40625 11.1309 1.81214 11.1309 2.31113V10.6528H12.5372V7.21369C12.5372 6.7147 12.9431 6.30881 13.442 6.30881C13.941 6.30881 14.3469 6.7147 14.3469 7.21369V10.6528H15.7532V8.70862C15.7532 8.20964 16.1591 7.80375 16.658 7.80375C17.157 7.80375 17.5629 8.20964 17.5629 8.70862V10.6528H18.9692V10.2922C18.9692 9.79317 19.3751 9.38728 19.874 9.38728C20.373 9.38728 20.7789 9.79317 20.7789 10.2922V17.8807H20.7788Z"
                                        fill="#212627" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- join End -->

        <!-- Team Start -->
        @if (count($players) > 0)
            <section class="team p-40">
                <div class="container">
                    <div class="heading">
                        <div class="left">
                            <h2 class="light-black">Meet Our Player</h2>
                            <p class="light-black">Our vision is to elevate cricket in Cambodia from schools, <br>
                                colleges, and local levels to the international stage.
                            </p>
                        </div>
                        <a href="{{ route('players') }}" class="cus-btn primary">See All
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                                fill="none">
                                <g clip-path="url(#clip0_925_431)">
                                    <path
                                        d="M19.8739 8.48103C19.5301 8.48103 19.2038 8.55711 18.9102 8.69234C18.675 7.66583 17.7549 6.8975 16.658 6.8975C16.3065 6.8975 15.9733 6.97667 15.6748 7.11762C15.4113 6.13128 14.5103 5.40252 13.442 5.40252C13.121 5.40252 12.8152 5.46842 12.5371 5.5872V2.81113C12.5372 1.53673 11.5004 0.5 10.226 0.5C8.95165 0.5 7.91486 1.53673 7.91486 2.81113V13.8079L6.72321 12.0389L6.70455 12.0157C5.81233 10.9066 4.24263 10.6601 3.05346 11.4425C2.43161 11.8516 2.01035 12.4791 1.86719 13.2095C1.72493 13.9354 1.87544 14.671 2.29099 15.2823L6.54391 21.9861L6.55807 22.0076C7.63001 23.5682 9.40033 24.5 11.2937 24.5H16.0657C19.4399 24.5 22.1851 21.7549 22.1851 18.3807V10.7921C22.1851 9.51777 21.1483 8.48103 19.8739 8.48103ZM20.7788 18.3807C20.7788 20.9795 18.6646 23.0938 16.0657 23.0938H11.2937C9.86786 23.0938 8.53451 22.3941 7.72432 21.2216L3.47201 14.5188L3.45785 14.4974C3.25211 14.1978 3.17735 13.8365 3.24719 13.4799C3.31708 13.1234 3.52277 12.817 3.82633 12.6173C4.39938 12.2403 5.15351 12.3527 5.59183 12.8765L9.32111 18.4123V2.81113C9.32111 2.31214 9.72705 1.90625 10.226 1.90625C10.725 1.90625 11.1309 2.31214 11.1309 2.81113V11.1528H12.5372V7.71369C12.5372 7.2147 12.9431 6.80881 13.442 6.80881C13.941 6.80881 14.3469 7.2147 14.3469 7.71369V11.1528H15.7532V9.20862C15.7532 8.70964 16.1591 8.30375 16.658 8.30375C17.157 8.30375 17.5629 8.70964 17.5629 9.20862V11.1528H18.9692V10.7922C18.9692 10.2932 19.3751 9.88728 19.874 9.88728C20.373 9.88728 20.7789 10.2932 20.7789 10.7922V18.3807H20.7788Z"
                                        fill="#F8F8FF" />
                                </g>
                                <defs>
                                    <clippath id="clip0_925_431">
                                        <rect width="24" height="24" fill="white"
                                            transform="translate(0 0.5)" />
                                    </clippath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                    <div class="team-slider">
                        @foreach ($players as $player)
                            @php
                                $slug = \Illuminate\Support\Str::slug($player->name);
                            @endphp
                            <a href="{{ route('playerDetails', $slug) }}" class="team-member">
                                <div class="content">
                                    <div class="info">
                                        <div class="left-stroke bg-green"></div>
                                        <h3 class="light-black mb-1">{{ $player->name }}</h3>
                                        <h6 class="dark-gray mb-12">
                                            {{ $player->player_type . ' / ' }}{{ $player->type == '1' ? 'Captain' : ($player->type == '2' ? 'Vice Captain' : 'Player') }}
                                        </h6>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>

                                    <img src="{{ asset('storage/player_images/' . $player->image) }}"
                                        onerror="this.onerror=null; this.src='{{ asset('front/img/12.avif') }}';">
                                </div>
                            </a>
                        @endforeach


                    </div>
                </div>
            </section>
        @endif

        <!-- Team End -->

        <!-- testimonials Start -->
        {{-- <section class="testimonials p-40">
            <div class="container">
                <div class="heading">
                    <div class="left">
                        <h2 class="light-black">Player Testimonials</h2>
                        <p class="light-black">Lorem ipsum dolor sit
                            amet consectetur. Quis <br> aliquam cursus
                            blandit nulla vitae. Eu imperdiet.
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="testimonials-slider">
                            <div class="testimonials-item">
                                <img src="front/img/testimonial/img-1.png" alt="">
                                <div class="content">
                                    <h4 class="light-black">Ethan Williams</h4>
                                    <p class="dark-gray">Lorem ipsum dolor sit amet consectetur. Sed <br> nam nec
                                        luctus enim orci pellentesque sed <br> varius. Nulla nam amet dignissim.</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="37" height="33"
                                        viewBox="0 0 37 33" fill="none">
                                        <path
                                            d="M36.9918 23.7826C36.9918 23.7866 36.9922 23.7906 36.9922 23.7945C36.9922 28.6026 33.0946 32.5002 28.2865 32.5002C23.4785 32.5002 19.5809 28.6027 19.5809 23.7945C19.5809 18.9864 23.4789 15.0888 28.2866 15.0888C29.2747 15.0888 30.2206 15.2611 31.1057 15.5646C29.147 4.32847 20.385 -2.91767 28.5073 3.04606C37.5138 9.65915 37.0019 23.5289 36.9918 23.7826Z"
                                            fill="#9EA2A8" />
                                        <path
                                            d="M9.13427 15.0889C10.1224 15.0889 11.0683 15.2611 11.9538 15.5646C9.99463 4.32854 1.23257 -2.9176 9.35497 3.04613C18.3615 9.65915 17.8496 23.5289 17.8395 23.7826C17.8395 23.7866 17.8399 23.7906 17.8399 23.7945C17.8399 28.6026 13.9423 32.5002 9.13426 32.5002C4.32611 32.5002 0.42857 28.6027 0.42857 23.7945C0.42857 18.9864 4.32655 15.0889 9.13427 15.0889Z"
                                            fill="#9EA2A8" />
                                    </svg>
                                </div>
                            </div>
                            <div class="testimonials-item">
                                <img src="front/img/testimonial/img-2.png" alt="">
                                <div class="content">
                                    <h4 class="light-black">Ethan Williams</h4>
                                    <p class="dark-gray">Lorem ipsum dolor sit amet consectetur. Sed <br> nam nec
                                        luctus enim orci pellentesque sed <br> varius. Nulla nam amet dignissim.</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="37" height="33"
                                        viewBox="0 0 37 33" fill="none">
                                        <path
                                            d="M36.9918 23.7826C36.9918 23.7866 36.9922 23.7906 36.9922 23.7945C36.9922 28.6026 33.0946 32.5002 28.2865 32.5002C23.4785 32.5002 19.5809 28.6027 19.5809 23.7945C19.5809 18.9864 23.4789 15.0888 28.2866 15.0888C29.2747 15.0888 30.2206 15.2611 31.1057 15.5646C29.147 4.32847 20.385 -2.91767 28.5073 3.04606C37.5138 9.65915 37.0019 23.5289 36.9918 23.7826Z"
                                            fill="#9EA2A8" />
                                        <path
                                            d="M9.13427 15.0889C10.1224 15.0889 11.0683 15.2611 11.9538 15.5646C9.99463 4.32854 1.23257 -2.9176 9.35497 3.04613C18.3615 9.65915 17.8496 23.5289 17.8395 23.7826C17.8395 23.7866 17.8399 23.7906 17.8399 23.7945C17.8399 28.6026 13.9423 32.5002 9.13426 32.5002C4.32611 32.5002 0.42857 28.6027 0.42857 23.7945C0.42857 18.9864 4.32655 15.0889 9.13427 15.0889Z"
                                            fill="#9EA2A8" />
                                    </svg>
                                </div>
                            </div>
                            <div class="testimonials-item">
                                <img src="front/img/testimonial/img-3.png" alt="">
                                <div class="content">
                                    <h4 class="light-black">Ethan Williams</h4>
                                    <p class="dark-gray">Lorem ipsum dolor sit amet consectetur. Sed <br> nam nec
                                        luctus enim orci pellentesque sed <br> varius. Nulla nam amet dignissim.</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="37" height="33"
                                        viewBox="0 0 37 33" fill="none">
                                        <path
                                            d="M36.9918 23.7826C36.9918 23.7866 36.9922 23.7906 36.9922 23.7945C36.9922 28.6026 33.0946 32.5002 28.2865 32.5002C23.4785 32.5002 19.5809 28.6027 19.5809 23.7945C19.5809 18.9864 23.4789 15.0888 28.2866 15.0888C29.2747 15.0888 30.2206 15.2611 31.1057 15.5646C29.147 4.32847 20.385 -2.91767 28.5073 3.04606C37.5138 9.65915 37.0019 23.5289 36.9918 23.7826Z"
                                            fill="#9EA2A8" />
                                        <path
                                            d="M9.13427 15.0889C10.1224 15.0889 11.0683 15.2611 11.9538 15.5646C9.99463 4.32854 1.23257 -2.9176 9.35497 3.04613C18.3615 9.65915 17.8496 23.5289 17.8395 23.7826C17.8395 23.7866 17.8399 23.7906 17.8399 23.7945C17.8399 28.6026 13.9423 32.5002 9.13426 32.5002C4.32611 32.5002 0.42857 28.6027 0.42857 23.7945C0.42857 18.9864 4.32655 15.0889 9.13427 15.0889Z"
                                            fill="#9EA2A8" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- testimonials End -->

        <!-- Blogs Start -->
        <section class="blog p-40">
            <div class="container">
                <div class="heading">
                    <div class="left">
                        <h2 class="light-black">Our Latest Blogs</h2>
                        {{-- <p class="light-black">Lorem ipsum dolor sit
                            amet consectetur. Quis <br> aliquam cursus
                            blandit nulla vitae. Eu imperdiet.
                        </p> --}}
                    </div>
                    <a href="#" class="cus-btn primary">See All
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                            fill="none">
                            <g clip-path="url(#clip0_925_432)">
                                <path
                                    d="M19.8739 8.48103C19.5301 8.48103 19.2038 8.55711 18.9102 8.69234C18.675 7.66583 17.7549 6.8975 16.658 6.8975C16.3065 6.8975 15.9733 6.97667 15.6748 7.11762C15.4113 6.13128 14.5103 5.40252 13.442 5.40252C13.121 5.40252 12.8152 5.46842 12.5371 5.5872V2.81113C12.5372 1.53673 11.5004 0.5 10.226 0.5C8.95165 0.5 7.91486 1.53673 7.91486 2.81113V13.8079L6.72321 12.0389L6.70455 12.0157C5.81233 10.9066 4.24263 10.6601 3.05346 11.4425C2.43161 11.8516 2.01035 12.4791 1.86719 13.2095C1.72493 13.9354 1.87544 14.671 2.29099 15.2823L6.54391 21.9861L6.55807 22.0076C7.63001 23.5682 9.40033 24.5 11.2937 24.5H16.0657C19.4399 24.5 22.1851 21.7549 22.1851 18.3807V10.7921C22.1851 9.51777 21.1483 8.48103 19.8739 8.48103ZM20.7788 18.3807C20.7788 20.9795 18.6646 23.0938 16.0657 23.0938H11.2937C9.86786 23.0938 8.53451 22.3941 7.72432 21.2216L3.47201 14.5188L3.45785 14.4974C3.25211 14.1978 3.17735 13.8365 3.24719 13.4799C3.31708 13.1234 3.52277 12.817 3.82633 12.6173C4.39938 12.2403 5.15351 12.3527 5.59183 12.8765L9.32111 18.4123V2.81113C9.32111 2.31214 9.72705 1.90625 10.226 1.90625C10.725 1.90625 11.1309 2.31214 11.1309 2.81113V11.1528H12.5372V7.71369C12.5372 7.2147 12.9431 6.80881 13.442 6.80881C13.941 6.80881 14.3469 7.2147 14.3469 7.71369V11.1528H15.7532V9.20862C15.7532 8.70964 16.1591 8.30375 16.658 8.30375C17.157 8.30375 17.5629 8.70964 17.5629 9.20862V11.1528H18.9692V10.7922C18.9692 10.2932 19.3751 9.88728 19.874 9.88728C20.373 9.88728 20.7789 10.2932 20.7789 10.7922V18.3807H20.7788Z"
                                    fill="#F8F8FF" />
                            </g>
                            <defs>
                                <clippath id="clip0_925_432">
                                    <rect width="24" height="24" fill="white" transform="translate(0 0.5)" />
                                </clippath>
                            </defs>
                        </svg>
                    </a>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="blog-card mb-lg-0 mb-24">
                            <img src="{{ asset('front/img/blog/img-1.png') }}" class="w-100" alt="">
                            <div class="info">
                                <div class="date-author mb-12">
                                    <div class="date">
                                        <h4 class="light-black">12</h4>
                                        <h6 class="light-black">September, 2024</h6>
                                    </div>
                                    <div class="author">
                                        <div class="text">
                                            <h6 class="">
                                                CLC Team
                                            </h6>
                                        </div>
                                        <img src="{{ asset('front/img/blog/author.png') }}" alt="">
                                    </div>
                                </div>
                                <h4 class="light-black mb-12">Mastering the Cricket Basics: A Beginner's Guide</h4>
                                <div class="reader-button">
                                    <div class="reader">
                                        <img src="{{ asset('front/img/blog/reader.png') }}" alt="">
                                        <h6 class="light-black">20+ Reading</h6>
                                    </div>
                                    <a href="#" class="cus-btn primary">Read more
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 24 25" fill="none">
                                            <g clip-path="url(#clip0_925_433)">
                                                <path
                                                    d="M19.8739 8.48103C19.5301 8.48103 19.2038 8.55711 18.9102 8.69234C18.675 7.66583 17.7549 6.8975 16.658 6.8975C16.3065 6.8975 15.9733 6.97667 15.6748 7.11762C15.4113 6.13128 14.5103 5.40252 13.442 5.40252C13.121 5.40252 12.8152 5.46842 12.5371 5.5872V2.81113C12.5372 1.53673 11.5004 0.5 10.226 0.5C8.95165 0.5 7.91486 1.53673 7.91486 2.81113V13.8079L6.72321 12.0389L6.70455 12.0157C5.81233 10.9066 4.24263 10.6601 3.05346 11.4425C2.43161 11.8516 2.01035 12.4791 1.86719 13.2095C1.72493 13.9354 1.87544 14.671 2.29099 15.2823L6.54391 21.9861L6.55807 22.0076C7.63001 23.5682 9.40033 24.5 11.2937 24.5H16.0657C19.4399 24.5 22.1851 21.7549 22.1851 18.3807V10.7921C22.1851 9.51777 21.1483 8.48103 19.8739 8.48103ZM20.7788 18.3807C20.7788 20.9795 18.6646 23.0938 16.0657 23.0938H11.2937C9.86786 23.0938 8.53451 22.3941 7.72432 21.2216L3.47201 14.5188L3.45785 14.4974C3.25211 14.1978 3.17735 13.8365 3.24719 13.4799C3.31708 13.1234 3.52277 12.817 3.82633 12.6173C4.39938 12.2403 5.15351 12.3527 5.59183 12.8765L9.32111 18.4123V2.81113C9.32111 2.31214 9.72705 1.90625 10.226 1.90625C10.725 1.90625 11.1309 2.31214 11.1309 2.81113V11.1528H12.5372V7.71369C12.5372 7.2147 12.9431 6.80881 13.442 6.80881C13.941 6.80881 14.3469 7.2147 14.3469 7.71369V11.1528H15.7532V9.20862C15.7532 8.70964 16.1591 8.30375 16.658 8.30375C17.157 8.30375 17.5629 8.70964 17.5629 9.20862V11.1528H18.9692V10.7922C18.9692 10.2932 19.3751 9.88728 19.874 9.88728C20.373 9.88728 20.7789 10.2932 20.7789 10.7922V18.3807H20.7788Z"
                                                    fill="#F8F8FF" />
                                            </g>
                                            <defs>
                                                <clippath id="clip0_925_433">
                                                    <rect width="24" height="24" fill="white"
                                                        transform="translate(0 0.5)" />
                                                </clippath>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="blog-card shadow mb-24">
                            <div class="info">
                                <div class="date-author mb-12">
                                    <div class="date">
                                        <h4 class="light-black">12</h4>
                                        <h6 class="light-black">September, 2024</h6>
                                    </div>
                                    <div class="author">
                                        <div class="text">
                                            <h6 class="">
                                                CLC Team
                                            </h6>
                                        </div>
                                        <img src="{{ asset('front/img/blog/author.png') }}" alt="">
                                    </div>
                                </div>
                                <h4 class="light-black mb-12">Mastering the Cricket Basics: A Beginner's Guide</h4>
                                <div class="reader-button">
                                    <div class="reader">
                                        <img src="{{ asset('front/img/blog/reader.png') }}" alt="">
                                        <h6 class="light-black">20+ Reading</h6>
                                    </div>
                                    <a href="#" class="cus-btn primary">Read more
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 24 25" fill="none">
                                            <g clip-path="url(#clip0_925_434)">
                                                <path
                                                    d="M19.8739 8.48103C19.5301 8.48103 19.2038 8.55711 18.9102 8.69234C18.675 7.66583 17.7549 6.8975 16.658 6.8975C16.3065 6.8975 15.9733 6.97667 15.6748 7.11762C15.4113 6.13128 14.5103 5.40252 13.442 5.40252C13.121 5.40252 12.8152 5.46842 12.5371 5.5872V2.81113C12.5372 1.53673 11.5004 0.5 10.226 0.5C8.95165 0.5 7.91486 1.53673 7.91486 2.81113V13.8079L6.72321 12.0389L6.70455 12.0157C5.81233 10.9066 4.24263 10.6601 3.05346 11.4425C2.43161 11.8516 2.01035 12.4791 1.86719 13.2095C1.72493 13.9354 1.87544 14.671 2.29099 15.2823L6.54391 21.9861L6.55807 22.0076C7.63001 23.5682 9.40033 24.5 11.2937 24.5H16.0657C19.4399 24.5 22.1851 21.7549 22.1851 18.3807V10.7921C22.1851 9.51777 21.1483 8.48103 19.8739 8.48103ZM20.7788 18.3807C20.7788 20.9795 18.6646 23.0938 16.0657 23.0938H11.2937C9.86786 23.0938 8.53451 22.3941 7.72432 21.2216L3.47201 14.5188L3.45785 14.4974C3.25211 14.1978 3.17735 13.8365 3.24719 13.4799C3.31708 13.1234 3.52277 12.817 3.82633 12.6173C4.39938 12.2403 5.15351 12.3527 5.59183 12.8765L9.32111 18.4123V2.81113C9.32111 2.31214 9.72705 1.90625 10.226 1.90625C10.725 1.90625 11.1309 2.31214 11.1309 2.81113V11.1528H12.5372V7.71369C12.5372 7.2147 12.9431 6.80881 13.442 6.80881C13.941 6.80881 14.3469 7.2147 14.3469 7.71369V11.1528H15.7532V9.20862C15.7532 8.70964 16.1591 8.30375 16.658 8.30375C17.157 8.30375 17.5629 8.70964 17.5629 9.20862V11.1528H18.9692V10.7922C18.9692 10.2932 19.3751 9.88728 19.874 9.88728C20.373 9.88728 20.7789 10.2932 20.7789 10.7922V18.3807H20.7788Z"
                                                    fill="#F8F8FF" />
                                            </g>
                                            <defs>
                                                <clippath id="clip0_925_434">
                                                    <rect width="24" height="24" fill="white"
                                                        transform="translate(0 0.5)" />
                                                </clippath>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-card shadow mb-24 d-lg-block d-none">
                            <div class="info">
                                <div class="date-author mb-12">
                                    <div class="date">
                                        <h4 class="light-black">12</h4>
                                        <h6 class="light-black">September, 2024</h6>
                                    </div>
                                    <div class="author">
                                        <div class="text">
                                            <h6 class="">
                                                CLC Team
                                            </h6>
                                        </div>
                                        <img src="{{ asset('front/img/blog/author.png') }}" alt="">
                                    </div>
                                </div>
                                <h4 class="light-black mb-12">Mastering the Cricket Basics: A Beginner's Guide</h4>
                                <div class="reader-button">
                                    <div class="reader">
                                        <img src="{{ asset('front/img/blog/reader.png') }}" alt="">
                                        <h6 class="light-black">20+ Reading</h6>
                                    </div>
                                    <a href="#" class="cus-btn primary">Read more
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 24 25" fill="none">
                                            <g clip-path="url(#clip0_925_435)">
                                                <path
                                                    d="M19.8739 8.48103C19.5301 8.48103 19.2038 8.55711 18.9102 8.69234C18.675 7.66583 17.7549 6.8975 16.658 6.8975C16.3065 6.8975 15.9733 6.97667 15.6748 7.11762C15.4113 6.13128 14.5103 5.40252 13.442 5.40252C13.121 5.40252 12.8152 5.46842 12.5371 5.5872V2.81113C12.5372 1.53673 11.5004 0.5 10.226 0.5C8.95165 0.5 7.91486 1.53673 7.91486 2.81113V13.8079L6.72321 12.0389L6.70455 12.0157C5.81233 10.9066 4.24263 10.6601 3.05346 11.4425C2.43161 11.8516 2.01035 12.4791 1.86719 13.2095C1.72493 13.9354 1.87544 14.671 2.29099 15.2823L6.54391 21.9861L6.55807 22.0076C7.63001 23.5682 9.40033 24.5 11.2937 24.5H16.0657C19.4399 24.5 22.1851 21.7549 22.1851 18.3807V10.7921C22.1851 9.51777 21.1483 8.48103 19.8739 8.48103ZM20.7788 18.3807C20.7788 20.9795 18.6646 23.0938 16.0657 23.0938H11.2937C9.86786 23.0938 8.53451 22.3941 7.72432 21.2216L3.47201 14.5188L3.45785 14.4974C3.25211 14.1978 3.17735 13.8365 3.24719 13.4799C3.31708 13.1234 3.52277 12.817 3.82633 12.6173C4.39938 12.2403 5.15351 12.3527 5.59183 12.8765L9.32111 18.4123V2.81113C9.32111 2.31214 9.72705 1.90625 10.226 1.90625C10.725 1.90625 11.1309 2.31214 11.1309 2.81113V11.1528H12.5372V7.71369C12.5372 7.2147 12.9431 6.80881 13.442 6.80881C13.941 6.80881 14.3469 7.2147 14.3469 7.71369V11.1528H15.7532V9.20862C15.7532 8.70964 16.1591 8.30375 16.658 8.30375C17.157 8.30375 17.5629 8.70964 17.5629 9.20862V11.1528H18.9692V10.7922C18.9692 10.2932 19.3751 9.88728 19.874 9.88728C20.373 9.88728 20.7789 10.2932 20.7789 10.7922V18.3807H20.7788Z"
                                                    fill="#F8F8FF" />
                                            </g>
                                            <defs>
                                                <clippath id="clip0_925_435">
                                                    <rect width="24" height="24" fill="white"
                                                        transform="translate(0 0.5)" />
                                                </clippath>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-card shadow d-xl-block d-none">
                            <div class="info">
                                <div class="date-author mb-12">
                                    <div class="date">
                                        <h4 class="light-black">12</h4>
                                        <h6 class="light-black">September, 2024</h6>
                                    </div>
                                    <div class="author">
                                        <div class="text">
                                            <h6 class="">
                                                CLC Team
                                            </h6>
                                        </div>
                                        <img src="{{ asset('front/img/blog/author.png') }}" alt="">
                                    </div>
                                </div>
                                <h4 class="light-black mb-12">Mastering the Cricket Basics: A Beginner's Guide</h4>
                                <div class="reader-button">
                                    <div class="reader">
                                        <img src="{{ asset('front/img/blog/reader.png') }}" alt="">
                                        <h6 class="light-black">20+ Reading</h6>
                                    </div>
                                    <a href="#" class="cus-btn primary">Read more
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                            viewBox="0 0 24 25" fill="none">
                                            <g clip-path="url(#clip0_925_436)">
                                                <path
                                                    d="M19.8739 8.48103C19.5301 8.48103 19.2038 8.55711 18.9102 8.69234C18.675 7.66583 17.7549 6.8975 16.658 6.8975C16.3065 6.8975 15.9733 6.97667 15.6748 7.11762C15.4113 6.13128 14.5103 5.40252 13.442 5.40252C13.121 5.40252 12.8152 5.46842 12.5371 5.5872V2.81113C12.5372 1.53673 11.5004 0.5 10.226 0.5C8.95165 0.5 7.91486 1.53673 7.91486 2.81113V13.8079L6.72321 12.0389L6.70455 12.0157C5.81233 10.9066 4.24263 10.6601 3.05346 11.4425C2.43161 11.8516 2.01035 12.4791 1.86719 13.2095C1.72493 13.9354 1.87544 14.671 2.29099 15.2823L6.54391 21.9861L6.55807 22.0076C7.63001 23.5682 9.40033 24.5 11.2937 24.5H16.0657C19.4399 24.5 22.1851 21.7549 22.1851 18.3807V10.7921C22.1851 9.51777 21.1483 8.48103 19.8739 8.48103ZM20.7788 18.3807C20.7788 20.9795 18.6646 23.0938 16.0657 23.0938H11.2937C9.86786 23.0938 8.53451 22.3941 7.72432 21.2216L3.47201 14.5188L3.45785 14.4974C3.25211 14.1978 3.17735 13.8365 3.24719 13.4799C3.31708 13.1234 3.52277 12.817 3.82633 12.6173C4.39938 12.2403 5.15351 12.3527 5.59183 12.8765L9.32111 18.4123V2.81113C9.32111 2.31214 9.72705 1.90625 10.226 1.90625C10.725 1.90625 11.1309 2.31214 11.1309 2.81113V11.1528H12.5372V7.71369C12.5372 7.2147 12.9431 6.80881 13.442 6.80881C13.941 6.80881 14.3469 7.2147 14.3469 7.71369V11.1528H15.7532V9.20862C15.7532 8.70964 16.1591 8.30375 16.658 8.30375C17.157 8.30375 17.5629 8.70964 17.5629 9.20862V11.1528H18.9692V10.7922C18.9692 10.2932 19.3751 9.88728 19.874 9.88728C20.373 9.88728 20.7789 10.2932 20.7789 10.7922V18.3807H20.7788Z"
                                                    fill="#F8F8FF" />
                                            </g>
                                            <defs>
                                                <clippath id="clip0_925_436">
                                                    <rect width="24" height="24" fill="white"
                                                        transform="translate(0 0.5)" />
                                                </clippath>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blogs End -->

    </div>
@endsection

@push('script')
    <script></script>
@endpush
