@extends('layouts.app')

@section('content')
    <!-- Page Start Banner Area Start -->
    <div class="page-title-banner">
        <div class="container">
            <div class="content">
                <h1 class="mb-16 light-black">Blog</h1>
                <p class="light-black">Our vision is to elevate cricket in Cambodia from schools, <br>
                    colleges, and local levels to the international stage.</p>
            </div>
        </div>
    </div>
    <!-- Page Start Banner Area End -->

    <!-- Main Content Start -->
    <div class="page-content">
        <!-- Blogs Start -->
        <section class="blog p-60">
            <div class="container">
                <div class="row mb-48">
                    <div class="col-lg-8 col-md-6 col-12">
                        <h2 class="light-black mb-md-0 mb-16">Our Latest Blogs</h2>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <form action="{{ route('blogs') }}" class="input-group search-bar">
                            <input type="text" placeholder="Search..." value="{{ request('search') }}" name="search">
                            <button class="search" type="submit">
                                <i class="far fa-search search-icon"></i></button>
                        </form>
                    </div>
                </div>
                @if (count($blogs) > 0)
                    <div class="row mb-32">
                        @foreach ($blogs as $blog)
                            <div class="col-xl-4 col-lg-6">
                                <div class="blog-card shadow mb-24">
                                    <img src="{{ asset('storage/blog_images/' . $blog->image) }}" class="w-100"
                                        alt="">
                                    <div class="info st-2">
                                        <div class="date-author mb-12">
                                            <div class="date">
                                                <h4 class="light-black">
                                                    {{ \Carbon\Carbon::parse($blog->date)->format('d') }}</h4>
                                                <h6 class="light-black">
                                                    {{ \Carbon\Carbon::parse($blog->date)->format('F, Y') }}
                                                </h6>
                                            </div>
                                            <div class="author">
                                                <div class="text">
                                                    <h6 class="">
                                                        CLC Team
                                                    </h6>
                                                </div>
                                                <img src="{{ asset('front/img/logo.png') }}" alt="">
                                            </div>
                                        </div>
                                        <h5 class="light-black mb-12">
                                            {{ strlen($blog->title) > 60 ? substr($blog->title, 0, 60) . '...' : $blog->title }}
                                        </h5>
                                        <div class="reader-button">
                                            <div class="reader">
                                                <img src="assets/media/blog/reader.png" alt="">
                                                <h6 class="light-black">{{ $blog->view_count }}+ Reading</h6>
                                            </div>
                                            <a href="{{ route('blog', $blog->slug) }}" class="cus-btn primary">Read More
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($blogs->onFirstPage())
                            <li class="disabled">
                                <span><i class="fas fa-chevron-left"></i></span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $blogs->previousPageUrl() }}" rel="prev">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($blogs->links()->elements[0] as $page => $url)
                            @if ($page == $blogs->currentPage())
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
                        @if ($blogs->hasMorePages())
                            <li>
                                <a href="{{ $blogs->nextPageUrl() }}" rel="next">
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
                            <h2 class="light-black mb-md-0 mb-16">No Blog Found</h2>
                        </div>

                    </div>
                @endif
            </div>
        </section>
        <!-- Blogs End -->

    </div>
    <!-- Main Content End -->
@endsection

@push('script')
@endpush
