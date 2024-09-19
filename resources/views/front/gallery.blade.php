@extends('layouts.app')

@section('content')
    <!-- Page Start Banner Area Start -->
    <div class="page-title-banner">
        <div class="container">
            <div class="content">
                <h1 class="mb-16 light-black">Gallery</h1>
                <p class="light-black">Our vision is to elevate cricket in Cambodia from schools, <br>
                    colleges, and local levels to the international stage.</p>
            </div>
        </div>
    </div>
    <!-- Page Start Banner Area End -->

    <!-- Main Content Start -->
    <div class="page-content">
        <!-- Gallery Start -->
        <section class="gallery p-40">
            <div class="container">
                <div class="heading">
                    <h3 class="light-black">Our Latest Gallery</h3>
                </div>
                <div class="row mb-32">
                    @foreach ($galleries as $gallery)
                        <div class="col-lg-4 col-sm-6 mb-24">
                            <div class="img-block br-20 shadow">
                                <img src="{{ asset('storage/galleries/' . $gallery->image) }}" alt>
                            </div>
                        </div>
                    @endforeach

                </div>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($galleries->onFirstPage())
                        <li class="disabled">
                            <span><i class="fas fa-chevron-left"></i></span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $galleries->previousPageUrl() }}" rel="prev">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($galleries->links()->elements[0] as $page => $url)
                        @if ($page == $galleries->currentPage())
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
                    @if ($galleries->hasMorePages())
                        <li>
                            <a href="{{ $galleries->nextPageUrl() }}" rel="next">
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
        <!-- Gallery End -->

    </div>

    <!-- Main Content End -->
@endsection

@push('script')
@endpush
