<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Striker HTML5 Template">

    <title>Star Cricket</title>


    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/img/favicon.ico') }}">

    <!-- All CSS files -->
    <link rel="stylesheet" href="{{ asset('front/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/vendor/aksVideoPlayer.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">

</head>

<body>
    <!-- Preloader-->
    <div id="preloader">
        <div class="loader">
            <!--cricket ball svg-->
            <img src="{{ asset('front/img/vector/boll.png') }}" id="ball" alt="ball">

            <!--cricket bat svg-->
            <svg id="bat" viewBox="0 0 460.84737 460.84737" xmlns="http://www.w3.org/2000/svg">
                <path d="m460.847656 31.75-25.070312 25.078125-31.761719-31.757813 25.082031-25.070312zm0 0"
                    fill="#a85d5d" />
                <path d="m378.945312 50.140625 25.070313-25.070313 31.761719 31.757813-25.070313 25.070313zm0 0"
                    fill="#7f4545" />
                <path d="m353.878906 75.210938 25.066406-25.070313 31.761719 31.757813-25.070312 25.070312zm0 0"
                    fill="#a85d5d" />
                <path d="m328.808594 100.28125 25.066406-25.070312 31.761719 31.757812-25.070313 25.070312zm0 0"
                    fill="#7f4545" />
                <path d="m360.566406 132.039062-25.078125 25.070313-31.75-31.75 25.070313-25.078125zm0 0"
                    fill="#a85d5d" />
                <path
                    d="m352.425781 190.320312-260.136719 260.140626c-13.847656 13.847656-36.296874 13.847656-50.140624 0l-31.761719-31.761719c-13.847657-13.84375-13.847657-36.296875 0-50.140625l260.140625-260.136719 25.070312 25.066406-.21875.222657-76.050781 107.808593 107.808594-76.050781.21875-.21875zm0 0"
                    fill="#ffd2a6" />
                <path d="m327.355469 165.25-.21875.21875-107.808594 76.050781 76.050781-107.808593.21875-.222657zm0 0"
                    fill="#7f4545" />
            </svg>
        </div>
    </div>
    <!-- Back To Top Start -->
    <a href="#main-wrapper" id="backto-top" class="back-to-top"><i class="fas fa-angle-up"></i></a>
    <!-- Main Wrapper Start Here -->
    <div id="main-wrapper" class="main-wrapper overflow-hidden">

        <!-- Main Header Area Start Here -->
        @include('front.inc.header')
        <!-- Main Header Area End Here -->



        @yield('content')
        <!-- Footer Area Start Here -->
        @include('front.inc.footer')
        <!-- Footer Area End Here -->

        <!-- modal-popup area start  -->
        <div class="modal fade" id="videoModal" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                        <div class="ratio ratio-16x9">
                            {{-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/EzDC8aAJln0"
                                id="video"></iframe> --}}

                            <video src="{{ asset('front/img/clc-video.mp4') }}" controls autoplay muted></video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal-popup area end  -->
    </div>
    <!-- Main Wrapper End Here -->

    <!-- Jquery Js -->
    <script src="{{ asset('front/js/vendor/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/jquery-appear.js') }}"></script>
    <script src="{{ asset('front/js/vendor/jquery-validator.js') }}"></script>
    <script src="{{ asset('front/js/vendor/aksVideoPlayer.js') }}"></script>
    <script src="{{ asset('backend/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Site Scripts -->
    <script src="{{ asset('front/js/app.js') }}"></script>
    <script>
        var success = "{{ Session::has('success') }}";
        $(document).ready(function() {
            if (success) {

                swal({
                    title: "Success",
                    text: "{{ Session::get('success') }}",
                    icon: "success",
                })
            }
        })

        var error = "{{ Session::has('error') }}";
        if (error) {
            Toast.fire({
                type: 'error',
                title: "{{ Session::get('error') }}"
            })
        }
    </script>
    @stack('script')

</body>

</html>
