@extends('layouts.app')

@section('content')
    <!-- Page Start Banner Area Start -->
    <div class="page-title-banner">
        <div class="container">
            <div class="content">
                <h1 class="mb-16 light-black">Player Detail</h1>
                <p class="light-black">Our vision is to elevate cricket in Cambodia from schools,
                    colleges, and local levels to the international stage.</p>
            </div>
        </div>
    </div>
    <!-- Page Start Banner Area End -->
    <!-- Main Content Start -->
    <div class="page-content">
        <!-- Player info Start -->
        <section class="player-info p-40">
            <div class="container position-relative">
                <div class="vector">
                    <img src="{{ asset('front/img/vector/vector.png') }}" alt="">
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="player-content">
                            <div class="info">
                                <h2 class="light-black mb-1">{{ $player->name }}</h2>
                                <h6 class="dark-gray mb-12">
                                    {{ $player->player_type . ' / ' }}{{ $player->type == '1' ? 'Captain' : ($player->type == '2' ? 'Vice Captain' : 'Player') }}
                                </h6>
                                <h6 class="dark-gray mb-12">
                                    Team: {{ @$player->team->name }}
                                </h6>
                                <div class="rating mb-24">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="light-black mb-12">Bio:</h4>
                                <p class="dark-gray mb-24">
                                    @if ($player->bio)
                                        {{ $player->bio }}
                                    @else
                                        {{ $player->name }} is a talented cricketer known
                                        for their skills in {{ $player->name }}. With a strong
                                        track record in domestic and international cricket, {{ $player->player_type }} has
                                        made
                                        a
                                        significant impact on the field. He brings exceptional
                                        technique, powerful performance, strategic play to the game, and continues to be a
                                        valuable asset to the team. {{ $player->name }}'s dedication and passion for cricket
                                        have
                                        earned him recognition and respect in the cricketing community.
                                    @endif

                                </p>
                                <h4 class="light-black mb-12">Share</h4>
                                <ul class="unstyled social-icons">
                                    <li><a href="player-detail.html">
                                            <img src="{{ asset('front/img/icons/Facebook.png') }}" alt=""></a></li>
                                    <li><a href="player-detail.html">
                                            <img src="{{ asset('front/img/icons/Twitter.png') }}" alt=""></a></li>
                                    <li><a href="player-detail.html">
                                            <img src="{{ asset('front/img/icons/Instagram.png') }}" alt=""></a>
                                    </li>
                                    <li><a href="player-detail.html">
                                            <img src="{{ asset('front/img/icons/Linkedin.png') }}" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="player-detail">
                            <div class="image">
                                <img src="{{ asset('storage/player_images/' . $player->image) }}" alt=""
                                    onerror="this.onerror=null; this.src='{{ asset('front/img/12.avif') }}';">
                            </div>
                            <div class="left-detail">
                                <div class="text-end">
                                    <div class="detail left-auto">
                                        <h5 class="green mb-8">Match</h5>

                                        <h4 class="light-black">{{ @$player->stats->matches ?? 0 }}</h4>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="detail left-right-auto">
                                        <h5 class="green mb-8">inn</h5>
                                        <h4 class="light-black">{{ @$player->stats->innings ?? 0 }}</h4>
                                    </div>
                                </div>
                                <div class="detail right-auto">
                                    <h5 class="green mb-8">Runs</h5>
                                    <h4 class="light-black">{{ @$player->stats->runs ?? 0 }}</h4>
                                </div>
                                <div class="text-center">
                                    <div class="detail left-right-auto">
                                        <h5 class="green mb-8">Catch</h5>
                                        <h4 class="light-black">{{ @$player->stats->catches ?? 0 }}</h4>
                                    </div>
                                </div>
                                <div class="text-end">

                                    <div class="detail left-auto">
                                        <h5 class="green mb-8">Avg</h5>
                                        <h4 class="light-black">{{ @$player->stats->average ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="right-detail">
                                <div class="text-start">
                                    <div class="detail right-auto">
                                        <h5 class="green mb-8">S/R</h5>
                                        <h4 class="light-black">{{ @$player->stats->strike_rate ?? 0 }}</h4>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="detail left-right-auto">
                                        <h5 class="green mb-8">HR</h5>
                                        <h4 class="light-black">{{ @$player->stats->highest_runs ?? 0 }}</h4>
                                    </div>
                                </div>
                                @php
                                    $is_bowler = strpos($player->player_type, 'Bowler') !== false ? true : false;
                                @endphp

                                <div class="text-end">
                                    <div class="detail left-auto">
                                        <h5 class="green mb-8">{{ $is_bowler ? 'Over' : '50' }}</h5>
                                        <h4 class="light-black">
                                            {{ $is_bowler ? @$player->stats->overs ?? 0 : @$player->stats->fifties ?? 0 }}
                                        </h4>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="detail left-right-auto">
                                        <h5 class="green mb-8">{{ $is_bowler ? 'Wicket' : '100' }}</h5>
                                        <h4 class="light-black">
                                            {{ $is_bowler ? @$player->stats->wickets ?? 0 : @$player->stats->hundreds ?? 0 }}
                                        </h4>
                                    </div>
                                </div>

                                <div class="text-start">
                                    <div class="detail left-auto">
                                        <h5 class="green mb-8">4s/6s</h5>
                                        <h4 class="light-black">
                                            {{ @$player->stats->fours ?? 0 }}/{{ @$player->stats->sixes ?? 0 }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Player info End -->

        <!-- About player Start -->
        <section class="about-player">
            <div class="container">
                <div class="col-lg-6 col-md-8 col-sm-12 ">
                    <h3 class="mb-32">About Player</h3>
                    <p class="mb-16">
                        @if ($player->history)
                            {{ $player->history }}
                        @elseif ($player->bio)
                            {{ $player->bio }}
                        @else
                            {{ $player->name }} is a talented cricketer known
                            for their skills in {{ $player->name }}. With a strong
                            track record in domestic and international cricket, {{ $player->player_type }} has
                            made
                            a
                            significant impact on the field. He brings exceptional
                            technique, powerful performance, strategic play to the game, and continues to be a
                            valuable asset to the team. {{ $player->name }}'s dedication and passion for cricket
                            have
                            earned him recognition and respect in the cricketing community.
                        @endif
                    </p>
                </div>
            </div>
        </section>
        <!-- About player End -->
    </div>
    <!-- Main Content End -->
@endsection

@push('script')
@endpush
