@extends('layouts.app')

@section('content')
    <!-- Page Start Banner Area Start -->
    <div class="page-title-banner">
        <div class="container">
            <div class="content">
                <h1 class="mb-4 light-black">Match Schedule</h1>
                <p class="light-black">Our vision is to elevate cricket in Cambodia from schools, <br>
                    colleges, and local levels to the international stage.</p>
            </div>
        </div>
    </div>
    <!-- Page Start Banner Area End -->
    <!-- Main Content Start -->
    <div class="page-content">
        <!-- Match list Start -->
        <section class="match-list p-40">
            <div class="container">
                <div class="row mb-48">
                    <div class="col-lg-8 col-md-6 col-12">
                        <h2 class="light-black mb-md-0 mb-16">Upcoming Match Schedule</h2>
                    </div>
                    {{-- <div class="col-lg-4 col-md-6 col-12">
                        <form action="https://uiparadox.co.uk/templates/cricket-pulse/v2/match-schedule.html"
                            class="input-group search-bar">
                            <input type="text" placeholder="Search..." required>
                            <button class="search" type="submit"><i class="far fa-search search-icon"></i></button>
                        </form>
                    </div> --}}
                </div>
                <div class="list-block mb-48">
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
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($upcomingMatches->onFirstPage())
                        <li class="disabled">
                            <span><i class="fas fa-chevron-left"></i></span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $upcomingMatches->previousPageUrl() }}" rel="prev">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($upcomingMatches->links()->elements[0] as $page => $url)
                        @if ($page == $upcomingMatches->currentPage())
                            <li>
                                <a href="#" class="active">{{ sprintf('%02d', $page) }}</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}">{{ sprintf('%02d', $page) }}</a>
                            </li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($upcomingMatches->hasMorePages())
                        <li>
                            <a href="{{ $upcomingMatches->nextPageUrl() }}" rel="next">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    @else
                        <li class="disabled">
                            <span><i class="fas fa-chevron-right"></i></span>
                        </li>
                    @endif
                </ul>
            </div>
        </section>
        <!-- Match list End -->
    </div>

    <!-- Main Content End -->
@endsection

@push('script')
@endpush
