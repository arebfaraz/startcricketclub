@extends('layouts.app')

@section('content')
    <!-- Page Start Banner Area Start -->
    <div class="page-title-banner">
        <div class="container">
            <div class="content">
                <h1 class="mb-16 light-black">Contact us</h1>
                <p class="light-black">Our vision is to elevate cricket in Cambodia from schools,
                    colleges, and local levels to the international stage.</p>
            </div>
        </div>
    </div>
    <!-- Page Start Banner Area End -->

    <!-- Main Content Start -->
    <div class="page-content">

        <!-- Contact Start -->
        <section class="contact p-60">
            <div class="container">
                <div class="row mb-24">
                    <div class="col-xl-4 mb-xl-0 mb-24">
                        <h3 class="light-black mb-32">Get in Touch with Us</h3>
                        <form method="post" action="{{ route('contactUs') }}" id="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="inputGroup white-bg mb-16">
                                        <input type="text" name="name" id="name" required autocomplete="off"
                                            value="{{ old('name') }}">
                                        <label for="name">Your Name</label>
                                    </div>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="inputGroup white-bg mb-16">
                                        <input type="email" name="email" id="email" required autocomplete="off"
                                            value="{{ old('email') }}">
                                        <label for="email">Your Email</label>
                                    </div>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="inputGroup white-bg mb-16">
                                        <input type="text" id="subject" name="subject" required
                                            value="{{ old('subject') }}" autocomplete="off">
                                        <label for="subject">Subject</label>
                                    </div>
                                    @error('subject')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="inputGroup white-bg mb-24">
                                        <textarea required id="comments" name="comments" autocomplete="off">{{ old('comments') }}</textarea>
                                        <label for="comments">Write your comments here</label>
                                    </div>
                                    @error('comments')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {!! NoCaptcha::display() !!}
                            @error('g-recaptcha-response')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" id="submit-btn" class="cus-btn primary w-100 mt-3">Send Message</button>
                        </form>
                    </div>
                    <div class="col-xl-8">
                        <iframe
                            src="https://maps.google.com/maps?width=100%25&amp;height=100%&amp;hl=en&amp;q=AZ%20Oval%20Cricket%20Ground,%20Phnom%20Penh,%20Cambodia&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                            width="100%" height="600px" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0">
                        </iframe>
                    </div>
                </div>
                <div class="row justify-content-center row-gap-4">
                    <div class="col-xl-6 col-md-6">
                        <div class="contact-info-blog shadow">
                            <i class="fal fa-map-marker-alt"></i>
                            <h6 class="light-black">AZ Oval Cricket Ground, Phnom Penh Cambodia.</h6>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <a href="tel:+85593227784" class="contact-info-blog shadow">
                            <i class="fal fa-phone-alt"></i>
                            <span>+855 93 227 784</span>
                        </a>

                    </div>
                    <div class="col-xl-3 col-md-6">
                        <a href="mailto:nirmaljit1983@gmail.com" class="contact-info-blog shadow">
                            <i class="fal fa-envelope"></i>
                            <span>nirmaljit1983@gmail.com</span>
                        </a>
                    </div>
                </div>

            </div>
        </section>
        <!-- Contact End -->

    </div>
    <!-- Main Content End -->
@endsection

@push('script')
    {!! NoCaptcha::renderJs() !!}

    <script>
        $(document).ready(function() {

            $("#submit-btn").on("click", function() {
                $(this).text('Sending...').attr('disabled', true)
                $("#contact-form").submit()
            })



        });
    </script>
@endpush
