@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('player.index') }}">Player</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <span>Add</span>
                    </li>

                </ul>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Add Player</h4>
                    <a href="{{ url()->previous() }}" class="btn btn-icon btn-round btn-primary">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('player.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('team_id') has-error  @enderror">
                                    <label for="team_id">Team<span class="text-danger">*</span></label>
                                    <select name="team_id" id="team_id" class="form-control select2">
                                        <option value="">Select Team</option>
                                        @foreach ($teams as $team)
                                            <option value="{{ $team->id }}"
                                                {{ old('team_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('team_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('name') has-error  @enderror">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control form-control-sm" id="name"
                                        placeholder="Enter Name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('email') has-error  @enderror">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control form-control-sm" id="email"
                                        placeholder="Enter Email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('phone') has-error  @enderror">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control form-control-sm "
                                        id="phone" placeholder="Enter Phone" value="{{ old('phone') }}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group @error('type') has-error  @enderror">
                                    <label for="type">Type<span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-control select2">
                                        <option value="">Select Type</option>
                                        <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>Captain
                                        </option>
                                        <option value="2" {{ old('type') == '2' ? 'selected' : '' }}>Vice Captain
                                        </option>
                                        <option value="3" {{ old('type') == '3' ? 'selected' : '' }}>Player
                                        </option>
                                    </select>
                                    @error('type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group @error('player_type') has-error  @enderror">
                                    <label for="player_type">Player Type<span class="text-danger">*</span></label>
                                    <select name="player_type" id="player_type" class="form-control select2">
                                        <option value="">Select Player Type</option>
                                        <option value="Right Hand Bowler"
                                            {{ old('player_type') == 'Right Hand Bowler' ? 'selected' : '' }}>Right Hand
                                            Bowler
                                        </option>
                                        <option value="Left Hand Bowler"
                                            {{ old('player_type') == 'Left Hand Bowler' ? 'selected' : '' }}>Left Hand
                                            Bowler
                                        </option>
                                        <option value="Right Hand Batsman"
                                            {{ old('player_type') == 'Right Hand Batsman' ? 'selected' : '' }}>Right Hand
                                            Batsman
                                        </option>
                                        <option value="Left Hand Batsman"
                                            {{ old('player_type') == 'Left Hand Batsman' ? 'selected' : '' }}>Left Hand
                                            Batsman
                                        </option>
                                        <option value="Wicket Keeper Batsman"
                                            {{ old('player_type') == 'Wicket Keeper Batsman' ? 'selected' : '' }}>
                                            Wicket Keeper
                                            Batsman
                                        </option>
                                        <option value="Wicket Keeper"
                                            {{ old('player_type') == 'Wicket Keeper' ? 'selected' : '' }}>Wicket Keeper
                                        </option>
                                        <option value="All Rounder"
                                            {{ old('player_type') == 'All Rounder' ? 'selected' : '' }}>All Rounder
                                        </option>
                                        <option value="Other" {{ old('player_type') == 'Other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                    @error('player_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group @error('nationality') has-error  @enderror">
                                    <label for="nationality">Nationality<span class="text-danger">*</span></label>
                                    <select name="nationality" id="nationality" class="form-control select2">
                                        <option value="">Select Nationality</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country['name'] }}"
                                                {{ old('nationality') == $country['name'] ? 'selected' : '' }}>
                                                {{ $country['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('ationality')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group  @error('status_in_cambodia') has-error  @enderror">
                                    <label for="status_in_cambodia">Status In Cambodia<span
                                            class="text-danger">*</span></label>
                                    <select name="status_in_cambodia" class="form-control select2"
                                        id="status_in_cambodia">
                                        <option value="">Select</option>
                                        <option value="Buisness Visa"
                                            {{ old('status_in_cambodia') == 'Buisness Visa' ? 'selected' : '' }}>
                                            Buisness
                                            Visa</option>
                                        <option value="Tourist Visa"
                                            {{ old('status_in_cambodia') == 'Tourist Visa' ? 'selected' : '' }}>Tourist
                                            Visa</option>
                                        <option value="Other"
                                            {{ old('status_in_cambodia') == 'Other' ? 'selected' : '' }}>
                                            Other
                                        </option>
                                    </select>
                                    @error('status_in_cambodia')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group @error('city') has-error  @enderror">
                                    <label for="city">Where Do You Live Currently<span
                                            class="text-danger">*</span></label>
                                    <select name="city" class="form-control select2" id="city">
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
                                    @error('city')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group @error('jersey_name') has-error  @enderror">
                                    <label for="jersey_name">Jersey Name<span class="text-danger">*</span></label>
                                    <input type="text" name="jersey_name" class="form-control form-control-sm"
                                        id="jersey_name" placeholder="Enter Jersey Name"
                                        value="{{ old('jersey_name') }}">
                                    @error('jersey_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group @error('jersey_size') has-error  @enderror">
                                    <label for="jersey_size">Jersey Size<span class="text-danger">*</span></label>
                                    <select name="jersey_size" class="form-control select2" id="jersey_size">
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

                            <div class="col-md-6">
                                <div class="form-group @error('jersey_number') has-error  @enderror">
                                    <label for="jersey_number">Jersey Number<span class="text-danger">*</span></label>
                                    <input type="text" name="jersey_number" class="form-control form-control-sm"
                                        id="jersey_number" placeholder="Enter Jersey Number"
                                        value="{{ old('jersey_number') }}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('jersey_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="text-danger jersey_no_err"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group @error('image') has-error  @enderror">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control form-control-sm"
                                        id="image" accept="image/*">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row imagePreview" id="imagePreview"></div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var jersey_nos = @json($jersey_nos);

        $(document).ready(function() {

            $('.select2').select2();

            $("#image").on("change", function() {
                $("#imagePreview").empty(); // Clear previous previews

                var files = this.files; // Get the selected files

                if (files.length > 0) {
                    $.each(files, function(i, file) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $("#imagePreview").append(`
                        <div class="col-auto">
                            <img src="${e.target.result}" class="img-fluid img-thumbnail" alt="Image Preview">
                        </div>
                    `);
                        };

                        reader.readAsDataURL(file); // Read the file as a data URL
                    });
                }
            });

            $("#jersey_number").on("keyup", function() {
                var no = $(this).val();

                if (jersey_nos.includes(no)) {
                    $(".jersey_no_err").text("Jersey number already taken");
                } else {
                    $(".jersey_no_err").text('');
                }
            });
        });
    </script>
@endsection
