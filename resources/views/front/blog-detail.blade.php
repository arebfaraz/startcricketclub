@extends('layouts.app')

@section('content')
    <!-- Page Start Banner Area Start -->
    <div class="page-title-banner">
        <div class="container">
            <div class="content">
                <h1 class="mb-16 light-black">Blog Detail</h1>
                <p class="light-black">Our vision is to elevate cricket in Cambodia from schools,
                    colleges, and local levels to the international stage.</p>
            </div>
        </div>
    </div>
    <!-- Page Start Banner Area End -->
    <!-- Main Content Start -->
    <div class="page-content">
        <!-- Blogs Start -->
        <section class="blog-detail p-60">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 mb-xl-0 mb-48 text-black">
                        <img src="{{ asset('storage/blog_images/' . $blog->image) }}" class="br-10 shadow w-100 mb-32"
                            alt="">
                        <h3 class="light-black mb-16">{{ $blog->title }}</h3>
                        <div class="data-tag mb-32">
                            <h6 class="light-black">{{ \Carbon\Carbon::parse($blog->date)->format('d F, Y') }}</h6>
                            {{-- <div class="tag">
                                <i class="fal fa-tag"></i>
                                <h6 class="dark-gray">Cricket, Sports</h6>
                            </div> --}}
                            <div class="author">
                                <img src="{{ asset('front/img/logo.png') }}" width="32" height="32" alt="">
                                <h6 class="dark-gray">CLC Team</h6>
                            </div>
                        </div>
                        {!! $blog->description !!}
                        <div class="next-prv-blog mt-5">
                            @if ($previous_blog)
                                <a href="{{ route('blog', $previous_blog->slug) }}" class="prv-blog">
                                    <img src="{{ asset('storage/blog_images/' . $previous_blog->image) }}" width="60"
                                        height="60" alt="">
                                    <div class="text">
                                        <p class="dark-gray mb-8">Previous Blog</p>
                                        <h5 class="light-black">
                                            {{ strlen($previous_blog->title) > 30 ? substr($previous_blog->title, 0, 30) . '...' : $previous_blog->title }}
                                        </h5>
                                    </div>
                                </a>
                            @else
                                <div class="prv-blog">
                                </div>
                            @endif

                            @if ($next_blog)
                                <a href="{{ route('blog', $next_blog->slug) }}" class="next-blog">
                                    <div class="text text-end">
                                        <p class="dark-gray mb-8">Next Blog</p>
                                        <h5 class="light-black">
                                            {{ strlen($next_blog->title) > 30 ? substr($next_blog->title, 0, 30) . '...' : $next_blog->title }}
                                        </h5>
                                    </div>
                                    <img src="{{ asset('storage/blog_images/' . $next_blog->image) }}" width="60"
                                        height="60" alt="">
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="row">
                            <div class="col-xl-12 col-lg-6">
                                <div class="popular mb-48">
                                    <h4 class="light-black mb-32">Popular Articles</h4>
                                    @foreach ($popular_blogs as $blog)
                                        <a href="{{ route('blog', $blog->slug) }}" class="articles mb-16">
                                            <img src="{{ asset('storage/blog_images/' . $blog->image) }}" alt=""
                                                width="94" height="86">
                                            <div class="text">
                                                <p class="dark-gray mb-8">
                                                    {{ \Carbon\Carbon::parse($blog->date)->format('d M, Y') }}</p>
                                                <h5 class="light-black">
                                                    {{ strlen($blog->title) > 60 ? substr($blog->title, 0, 60) . '...' : $blog->title }}
                                                </h5>
                                            </div>
                                        </a>
                                    @endforeach

                                </div>
                            </div>

                            {{-- <div class="col-xl-12 col-lg-6">
                                <div class="instagram mb-48">
                                    <h4 class="light-black mb-32">Instagram Stories</h4>
                                    <div class="row mb-16">
                                        <div class="col-4">
                                            <a class="instagram-image">
                                                <img src="assets/media/instagram/img-1.png" alt="">
                                                <div class="icon">
                                                    <i class="fab fa-instagram"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a class="instagram-image">
                                                <img src="assets/media/instagram/img-2.png" alt="">
                                                <div class="icon">
                                                    <i class="fab fa-instagram"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a class="instagram-image">
                                                <img src="assets/media/instagram/img-3.png" alt="">
                                                <div class="icon">
                                                    <i class="fab fa-instagram"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a class="instagram-image">
                                                <img src="assets/media/instagram/img-4.png" alt="">
                                                <div class="icon">
                                                    <i class="fab fa-instagram"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a class="instagram-image">
                                                <img src="assets/media/instagram/img-5.png" alt="">
                                                <div class="icon">
                                                    <i class="fab fa-instagram"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a class="instagram-image">
                                                <img src="assets/media/instagram/img-6.png" alt="">
                                                <div class="icon">
                                                    <i class="fab fa-instagram"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="text">
                                            <h6 class="dark-gray mb-8">INSTAGRAM</h6>
                                            <h5 class="light-black">@CRICKETPULSE</h5>
                                        </div>
                                        <a href="blog-detail.html" class="cus-btn primary">Follow Us
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div> --}}

                        </div>





                    </div>
                </div>
            </div>
        </section>
        <!-- Blogs End -->

    </div>
    <!-- Main Content End -->
@endsection

@push('script')
@endpush
