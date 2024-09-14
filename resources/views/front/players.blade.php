@extends('layouts.app')

@section('content')
    <!-- Page Start Banner Area Start -->
    <div class="page-title-banner">
        <div class="container">
            <div class="content">
                <h1 class="mb-4 light-black">Players</h1>
                <p class="light-black">Our vision is to elevate cricket in Cambodia from schools,
                    colleges, and local levels to the international stage.</p>
            </div>
        </div>
    </div>
    <!-- Page Start Banner Area End -->
    <!-- Main Content Start -->
    <div class="page-content">
        <!-- Team Start -->
        <section class="team p-40">
            <div class="container">
                <div class="row mb-48">
                    <div class="col-lg-8 col-md-6 col-12">
                        <h2 class="light-black mb-md-0 mb-16">All Players</h2>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <form action="{{ route('players') }}" class="input-group search-bar">
                            <input type="text" placeholder="Search..." value="{{ request('search') }}" name="search">
                            <button class="search" type="submit">
                                <i class="far fa-search search-icon"></i></button>
                        </form>
                    </div>
                </div>
                @if (count($players) > 0)
                    <div class="row mb-32">
                        @foreach ($players as $player)
                            @php
                                $slug = \Illuminate\Support\Str::slug($player->name);
                            @endphp
                            <div class="col-xl-4 col-md-6">
                                <div class="team-member mb-24">
                                    <div class="content">
                                        <a href="{{ route('playerDetails', $slug) }}">
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
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($players->onFirstPage())
                            <li class="disabled">
                                <span><i class="fas fa-chevron-left"></i></span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $players->previousPageUrl() }}" rel="prev">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($players->links()->elements[0] as $page => $url)
                            @if ($page == $players->currentPage())
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
                        @if ($players->hasMorePages())
                            <li>
                                <a href="{{ $players->nextPageUrl() }}" rel="next">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        @else
                            <li class="disabled">
                                <span><i class="fas fa-chevron-right"></i></span>
                            </li>
                        @endif
                    </ul>
                @else
                    <div class="row mb-48">
                        <div class="col-lg-8 col-md-6 col-12">
                            <h2 class="light-black mb-md-0 mb-16">No Player Found</h2>
                        </div>

                    </div>
                @endif

            </div>
        </section>
        <!-- Team End -->

    </div>

    <!-- Main Content End -->
@endsection

@push('script')
@endpush
