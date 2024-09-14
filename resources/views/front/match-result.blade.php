@extends('layouts.app')

@section('content')
    <!-- Page Start Banner Area Start -->
    <div class="page-title-banner">
        <div class="container">
            <div class="content">
                <h1 class="mb-4 light-black">Match Result</h1>
                <p class="light-black">Our vision is to elevate cricket in Cambodia from schools, <br>
                    colleges, and local levels to the international stage.</p>
            </div>
        </div>
    </div>
    <!-- Page Start Banner Area End -->
    <!-- Main Content Start -->
    <div class="page-content">
        <!-- Match Results Start -->
        <section class="match-results p-40">
            <div class="container">
                <div class="row mb-48">
                    <div class="col-lg-8 col-md-6 col-12">
                        <h2 class="light-black mb-md-0 mb-16">Match Result List</h2>
                    </div>

                </div>
                <div class="result mb-32">
                    <div class="row ">
                        @foreach ($results as $result)
                            <div class="col-xl-6 col-12 mb-24">

                                <div class="result-block">
                                    <div class="item">
                                        <div class="teams">
                                            <div class="team">
                                                <div class="team-logo-name">
                                                    <img src="{{ asset('storage/team_logos/' . $result->team_1->logo) }}"
                                                        alt>
                                                    <h5 class="light-black">{{ @$result->team_1->name }}</h5>
                                                </div>
                                                <h5 class="light-black">
                                                    {{ $result->team_1_score . '/' . $result->team_1_wicket }}
                                                    <span class="dark-gray">({{ $result->team_1_over }})</span>
                                                </h5>
                                            </div>
                                            <div class="team">
                                                <h5 class="light-black">
                                                    {{ $result->team_2_score . '/' . $result->team_2_wicket }}
                                                    <span class="dark-gray">({{ $result->team_2_over }})</span>
                                                </h5>
                                                <div class="team-logo-name">
                                                    <img src="{{ asset('storage/team_logos/' . $result->team_2->logo) }}"
                                                        alt>
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
                            </div>
                        @endforeach


                    </div>
                </div>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($results->onFirstPage())
                        <li class="disabled">
                            <span><i class="fas fa-chevron-left"></i></span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $results->previousPageUrl() }}" rel="prev">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($results->links()->elements[0] as $page => $url)
                        @if ($page == $results->currentPage())
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
                    @if ($results->hasMorePages())
                        <li>
                            <a href="{{ $results->nextPageUrl() }}" rel="next">
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
        <!-- Match Results End -->

    </div>


    <!-- Main Content End -->
@endsection

@push('script')
@endpush
