@extends('layouts.app')

@section('content')
    @php
        use Gregwar\Captcha\CaptchaBuilder;

        try {
            $builder = new CaptchaBuilder();
            $builder->build();
            $session = $builder->getPhrase();
            Session::put('session_refresh', $session);
        } catch (Exception $e) {
            //
        }

    @endphp
    <!-- Page Start Banner Area Start -->
    <div class="page-title-banner">
        <div class="container">
            <div class="content">
                <h1 class="mb-4 light-black">Membership</h1>

            </div>
        </div>
    </div>
    <!-- Page Start Banner Area End -->
    <!-- Main Content Start -->
    <div class="page-content">

        <!-- Contact Start -->
        <section class="contact p-60">
            <div class="container">
                <div class="row mb-24 justify-content-center">
                    <div class="col-xl-8  mb-xl-0 mb-24">
                        <form id="membership-form" method="post" action="{{ route('membershipStore') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">

                                    @if (Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {!! Session::get('error') !!}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <div class="inputGroup white-bg mb-4 file">
                                        <input type="file" name="photo" id="photo" accept="image/*">
                                        <label for="photo">Upload Photo<span class="text-danger">*</span></label>
                                        @error('photo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="inputGroup white-bg mb-4">
                                        <input type="text" name="player_name" id="player_name"
                                            value="{{ old('player_name') }}" autocomplete="off">
                                        <label for="player_name">Player Name<span class="text-danger">*</span></label>
                                        @error('player_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="inputGroup white-bg mb-4">
                                        <input type="text" name="nationality" id="nationality"
                                            value="{{ old('nationality') }}" autocomplete="off">
                                        <label for="nationality">Nationality<span class="text-danger">*</span></label>
                                        @error('nationality')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="inputGroup white-bg mb-4 select">
                                        <select name="status" id="status">
                                            <option value="">Select</option>
                                            <option value="Buisness Visa"
                                                {{ old('status') == 'Buisness Visa' ? 'selected' : '' }}>Buisness
                                                Visa</option>
                                            <option value="Tourist Visa"
                                                {{ old('status') == 'Tourist Visa' ? 'selected' : '' }}>Tourist
                                                Visa</option>
                                            <option value="Other" {{ old('status') == 'Other' ? 'selected' : '' }}>
                                                Other
                                            </option>
                                        </select>
                                        <label for="status">Status In Cambodia<span class="text-danger">*</span></label>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="inputGroup white-bg mb-4">
                                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                            autocomplete="off">
                                        <label for="phone">Phone<span class="text-danger">*</span></label>
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="inputGroup white-bg mb-4 select">
                                        <select name="player_type" id="player_type">
                                            <option value="">Select</option>
                                            <option value="Right Hand Bowler"
                                                {{ old('player_type') == 'Right Hand Bowler' ? 'selected' : '' }}>Right
                                                Hand
                                                Bowler
                                            </option>
                                            <option value="Left Hand Bowler"
                                                {{ old('player_type') == 'Left Hand Bowler' ? 'selected' : '' }}>Left
                                                Hand
                                                Bowler
                                            </option>
                                            <option value="Right Hand Batsman"
                                                {{ old('player_type') == 'Right Hand Batsman' ? 'selected' : '' }}>
                                                Right
                                                Hand
                                                Batsman
                                            </option>
                                            <option value="Left Hand Batsman"
                                                {{ old('player_type') == 'Left Hand Batsman' ? 'selected' : '' }}>Left
                                                Hand
                                                Batsman
                                            </option>
                                            <option value="Wicket Keeper Batsman"
                                                {{ old('player_type') == 'Wicket Keeper Batsman' ? 'selected' : '' }}>
                                                Wicket Keeper
                                                Batsman
                                            </option>
                                            <option value="Wicket Keeper"
                                                {{ old('player_type') == 'Wicket Keeper' ? 'selected' : '' }}>Wicket
                                                Keeper
                                            </option>
                                            <option value="All Rounder"
                                                {{ old('player_type') == 'All Rounder' ? 'selected' : '' }}>All Rounder
                                            </option>
                                            <option value="Other" {{ old('player_type') == 'Other' ? 'selected' : '' }}>
                                                Other
                                            </option>
                                        </select>
                                        <label for="player_type">Player Types<span class="text-danger">*</span></label>
                                        @error('player_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="inputGroup white-bg mb-4 select">
                                        <select name="city" id="city">
                                            <option value="">Select</option>
                                            <option value="Phnom Penh" {{ old('city') == 'Phnom Penh' ? 'selected' : '' }}>
                                                Phnom Penh
                                            </option>
                                            <option value="Seim Reap" {{ old('city') == 'Seim Reap' ? 'selected' : '' }}>
                                                Siem Reap
                                            </option>
                                            <option value="Battambong" {{ old('city') == 'Battambong' ? 'selected' : '' }}>
                                                Battambong
                                            </option>
                                            <option value="Sihanoukville"
                                                {{ old('city') == 'Sihanoukville' ? 'selected' : '' }}>Sihanoukville
                                            </option>

                                            <option value="Other" {{ old('city') == 'Other' ? 'selected' : '' }}>
                                                Other
                                            </option>
                                        </select>
                                        <label for="email">Where Do You Live Currently<span
                                                class="text-danger">*</span></label>
                                        @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="inputGroup white-bg mb-4">
                                        <input type="text" id="jersey_name" name="jersey_name"
                                            value="{{ old('jersey_name') }}" autocomplete="off">
                                        <label for="jersey_name">Jersey Name<span class="text-danger">*</span></label>
                                        @error('jersey_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="inputGroup white-bg mb-4 select">
                                        <select name="jersey_size" id="jersey_size">
                                            <option value="">Select</option>
                                            <option value="S" {{ old('jersey_size') == 'S' ? 'selected' : '' }}>
                                                S
                                            </option>
                                            <option value="M" {{ old('jersey_size') == 'M' ? 'selected' : '' }}>
                                                M
                                            </option>
                                            <option value="L" {{ old('jersey_size') == 'L' ? 'selected' : '' }}>
                                                L
                                            </option>
                                            <option value="XL" {{ old('jersey_size') == 'XL' ? 'selected' : '' }}>
                                                XL
                                            </option>

                                            <option value="XXL" {{ old('jersey_size') == 'XXL' ? 'selected' : '' }}>
                                                XXL
                                            </option>
                                        </select>
                                        <label for="email">Jersey Size<span class="text-danger">*</span></label>
                                        @error('jersey_size')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="inputGroup white-bg mb-4">
                                        <input type="text" id="jersey_number" name="jersey_number"
                                            value="{{ old('jersey_number') }}" autocomplete="off">
                                        <label for="jersey_number">Jersey Number<span class="text-danger">*</span></label>
                                        @error('jersey_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex text-dark gap-3 white-bg mb-4">
                                        <input type="checkbox" id="is_agree" name="is_agree" value="1"
                                            {{ old('is_agree') == '1' ? 'checked' : '' }} required>
                                        <label for="is_agree">I agree to the Terms and Conditions</label>
                                        @error('is_agree')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <button type="button" class="btn btn-dark pay-now">Pay Now</button>
                                </div>
                                <div class="d-none" id="payment-div">

                                    <div class="col-12 mb-4">
                                        <img src="{{ asset('front/img/qr_code.jpg') }}" width="300" alt="">
                                    </div>

                                    <div class="col-12">
                                        <div class="inputGroup white-bg mb-4 file">
                                            <input type="file" name="payment_screenshot" id="payment_screenshot"
                                                accept="image/*">
                                            <label for="payment_screenshot">Upload Payment Screenshot<span
                                                    class="text-danger">*</span></label>
                                            @error('payment_screenshot')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6 d-flex align-items-center gap-3">


                                    <img id="your-selector" src="{{ $builder->inline() }}" class="" />
                                    <i class="fas fa-sync-alt cursor-pointer fs-1 ml-2 text-dark"
                                        id="captcha-refresh"></i>


                                </div>
                                <div class="row mt-3">


                                    <div class="col-md-6">
                                        <div class="inputGroup white-bg mb-4">
                                            <input type="text" id="g-recaptcha-response" name="captcha_code"
                                                value="{{ old('captcha_code') }}" autocomplete="off">
                                            <label for="captcha_code">Captcha<span class="text-danger">*</span></label>
                                            @error('captcha_code')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="cus-btn primary w-100">Send</button>
                        </form>
                    </div>

                </div>


            </div>
        </section>
        <!-- Contact End -->

    </div>
    <!-- Main Content End -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(".pay-now").on("click", function() {
                $("#payment-div").removeClass("d-none");
            })

            $(".cus-btn").on("click", function() {
                $(this).text('Sending...').attr('disabled', true)
                $("#membership-form").submit()
            })

            $("#captcha-refresh").click(function() {

                $.ajax({
                    type: "GET",
                    url: "/update-captcha",
                    data: "$builder->inline()",
                    success: function(result, status, xhr) {
                        console.log(result);

                        $("img#your-selector").attr("src", result['result']);

                    }

                })
            });

        });
    </script>
@endpush
