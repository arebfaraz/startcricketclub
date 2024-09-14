@extends('layouts.app')

@section('content')
    <!-- Page Start Banner Area Start -->
    <div class="page-title-banner">
        <div class="container">
            <div class="content">
                <h1 class="mb-16 light-black">About us</h1>
                <p class="light-black">Our vision is to elevate cricket in Cambodia from schools,
                    colleges, and local levels to the international stage.</p>
            </div>
        </div>
    </div>
    <!-- Page Start Banner Area End -->

    <!-- Main Content Start -->
    <div class="page-content">

        <!-- About Start -->
        <section class="about p-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-lg-0 mb-24">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs " data-bs-tabs="tabs">
                                    <li class="nav-item">
                                        <a href="#mission" class="active" aria-current="true"
                                            data-bs-toggle="tab">Mission</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#Vision" class="" aria-current="false"
                                            data-bs-toggle="tab">Vision</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#values" class="" aria-current="false"
                                            data-bs-toggle="tab">Values</a>
                                    </li>
                                </ul>
                            </div>
                            <form class="card-body tab-content">
                                <div class="tab-pane active" id="mission">
                                    <p class="dark-gray mb-16">We are Cricket Lovers Cambodia having first dedicated and
                                        fully equipped Cricket Ground in Phnom Penh, Cambodia. Our vision is to promote
                                        Cricket in Cambodia from school, colleges, university and local sectors level to
                                        International cricket level.</p>


                                </div>
                                <div class="tab-pane" id="Vision">
                                    <p class="dark-gray mb-16">We are officially registered with the Cricket Federation of
                                        Cambodia and proudly operate the first dedicated and fully equipped cricket ground
                                        in Phnom Penh. Our vision is to advance cricket in Cambodia from schools, colleges,
                                        and universities to the international stage. We aim to support and develop both
                                        expatriate and local young talent.</p>

                                </div>
                                <div class="tab-pane" id="values">
                                    <p class="dark-gray mb-16">We are Cricket Lovers Cambodia having first dedicated and
                                        fully equipped Cricket Ground in Phnom Penh, Cambodia. Our vision is to promote
                                        Cricket in Cambodia from school, colleges, university and local sectors level to
                                        International cricket level.</p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="image-block">
                            <div class="members">
                                <img src="assets/media/blog/reader-2.png" alt="">
                                <div class="">
                                    <h3 class="green">100+</h3>
                                    <h4 class="light-black">Members</h4>
                                </div>
                            </div>
                            <img src="{{ asset('front/img/about/img.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About End -->

        <!-- Achievements Start -->
        <section class="achievement">
            <div class="celebrattion-image">
                <img src="{{ asset('front/img/achievement/celebration-image.png') }}" alt>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-6">
                        <div class="p-40">
                            <h3 class="light-black mb-24">The Cricket Pulse
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

    </div>
@endsection

@push('script')
    <script></script>
@endpush
