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

                                <div class="col-md-12">
                                    <div class="form-group mb-4 text-dark @error('photo') has-error  @enderror">
                                        <label for="photo">Upload Photo<span class="text-danger">*</span></label>
                                        <input type="file" name="photo" class="form-control image" id="photo"
                                            data-id="#photoPreview">
                                        @error('photo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row" id="photoPreview"></div>

                                <div class="col-md-12">
                                    <div class="form-group mb-4 text-dark @error('player_name') has-error  @enderror">
                                        <label for="player_name">Player Name<span class="text-danger">*</span></label>
                                        <input type="text" name="player_name" class="form-control " id="player_name"
                                            placeholder="Enter Player Name" value="{{ old('player_name') }}">
                                        @error('player_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-4 text-dark @error('nationality') has-error  @enderror">
                                        <label for="nationality">Nationality<span class="text-danger">*</span></label>
                                        <select name="nationality" id="nationality" class="form-control text-dark ">
                                            <option value="">Select</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country['name'] }}"
                                                    {{ old('nationality') == $country['name'] ? 'selected' : '' }}>
                                                    {{ $country['name'] }}</option>
                                            @endforeach
                                        </select>

                                        @error('nationality')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-4 text-dark @error('status') has-error  @enderror">
                                        <label for="status">Status In Cambodia<span class="text-danger">*</span></label>
                                        <select name="status" class="form-control text-dark" id="status">
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
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-4 text-dark @error('phone') has-error  @enderror">
                                        <label for="phone">Phone<span class="text-danger">*</span></label>
                                        <input type="text" name="phone" class="form-control " id="phone"
                                            placeholder="Enter Phone" value="{{ old('phone') }}"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-4 text-dark @error('email') has-error  @enderror">
                                        <label for="email">Email<span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control " id="email"
                                            placeholder="Enter Email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-4 text-dark @error('player_type') has-error  @enderror">
                                        <label for="player_type">Player Types<span class="text-danger">*</span></label>
                                        <select name="player_type" class="form-control text-dark" id="player_type">
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
                                        @error('player_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group mb-4 text-dark @error('city') has-error  @enderror">
                                        <label for="city">Where Do You Live Currently<span
                                                class="text-danger">*</span></label>
                                        <select name="city" class="form-control text-dark" id="city">
                                            <option value="">Select</option>
                                            <option value="Phnom Penh"
                                                {{ old('city') == 'Phnom Penh' ? 'selected' : '' }}>
                                                Phnom Penh
                                            </option>
                                            <option value="Seim Reap" {{ old('city') == 'Seim Reap' ? 'selected' : '' }}>
                                                Siem Reap
                                            </option>
                                            <option value="Battambong"
                                                {{ old('city') == 'Battambong' ? 'selected' : '' }}>
                                                Battambong
                                            </option>
                                            <option value="Sihanoukville"
                                                {{ old('city') == 'Sihanoukville' ? 'selected' : '' }}>Sihanoukville
                                            </option>

                                            <option value="Other" {{ old('city') == 'Other' ? 'selected' : '' }}>
                                                Other
                                            </option>
                                        </select>
                                        @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group mb-4 text-dark @error('jersey_name') has-error  @enderror">
                                        <label for="jersey_name">Jersey Name<span class="text-danger">*</span></label>
                                        <input type="text" name="jersey_name" class="form-control " id="jersey_name"
                                            placeholder="Enter Jersey Name" value="{{ old('jersey_name') }}">
                                        @error('jersey_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group mb-4 text-dark @error('jersey_size') has-error  @enderror">
                                        <label for="jersey_size">Jersey Size<span class="text-danger">*</span></label>
                                        <select name="jersey_size" class="form-control text-dark" id="jersey_size">
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
                                        @error('jersey_size')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group mb-4 text-dark @error('jersey_number') has-error  @enderror">
                                        <label for="jersey_number">Jersey Number<span class="text-danger">*</span></label>
                                        <input type="text" name="jersey_number" class="form-control "
                                            id="jersey_number" placeholder="Enter Jersey Number"
                                            value="{{ old('jersey_number') }}"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        @error('jersey_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="text-danger jersey_no_err"></div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex text-dark gap-3 white-bg">
                                        <input type="checkbox" id="is_agree" name="is_agree" value="1"
                                            {{ old('is_agree') == '1' ? 'checked' : '' }} required>
                                        <label for="is_agree">I agree to the Terms and Conditions</label>
                                    </div>
                                    @error('is_agree')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 my-4">
                                    <button type="button" class="btn btn-dark pay-now">Pay Now</button>
                                </div>
                                <div class="d-none" id="payment-div">

                                    <div class="col-12 mb-4">
                                        <img src="{{ asset('front/img/qr_code.jpg') }}" width="300" alt="">
                                    </div>


                                    <div class="col-md-12">
                                        <div
                                            class="form-group mb-4 text-dark @error('payment_screenshot') has-error  @enderror">
                                            <label for="payment_screenshot">Upload Payment Screenshot</label>
                                            <input type="file" name="payment_screenshot" class="form-control image"
                                                id="payment_screenshot" data-id="#paymentPreview">
                                            @error('payment_screenshot')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row" id="paymentPreview"></div>


                                </div>
                                <div class="col-md-6 d-flex align-items-center gap-3">


                                    <img id="your-selector" src="{{ $builder->inline() }}" class="" />
                                    <i class="fas fa-sync-alt cursor-pointer fs-2 ml-2 text-dark"
                                        id="captcha-refresh"></i>
                                </div>
                                <div class="row mt-3">

                                    <div class="col-md-6">
                                        <div class="form-group mb-4 text-dark">
                                            <label for="captcha_code">Captcha<span class="text-danger">*</span></label>
                                            <input type="text" id="g-recaptcha-response" name="captcha_code"
                                                class="form-control " id="captcha_code" placeholder="Enter Captcha">
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
        var jersey_nos = @json($jersey_nos);

        $(document).ready(function() {

            $(".pay-now").on("click", function() {
                $("#payment-div").removeClass("d-none");
            })

            $(".cus-btn").on("click", function() {
                $(this).text('Sending...').attr('disabled', true)
                $("#membership-form").submit()
            })

            $("#jersey_number").on("keyup", function() {
                var no = $(this).val();

                if (jersey_nos.includes(no)) {
                    $(".jersey_no_err").text("Jersey number already taken");
                } else {
                    $(".jersey_no_err").text('');
                }
            });

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

            $(".image").on("change", function() {
                var id = $(this).data('id');
                $(id).empty(); // Clear previous previews

                var files = this.files; // Get the selected files

                if (files.length > 0) {
                    $.each(files, function(i, file) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $(id).append(`
                        <div class="col-auto mb-4">
                            <img src="${e.target.result}" class="img-fluid img-thumbnail" width="100" height="150" alt="Image Preview">
                        </div>
                    `);
                        };

                        reader.readAsDataURL(file); // Read the file as a data URL
                    });
                }
            });
        });
    </script>
@endpush
