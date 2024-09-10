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
                        <span>Update</span>
                    </li>

                </ul>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Update Player</h4>
                    <a href="{{ url()->previous() }}" class="btn btn-icon btn-round btn-primary">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('player.update', $player->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('team_id') has-error  @enderror">
                                    <label for="team_id">Team<span class="text-danger">*</span></label>
                                    <select name="team_id" id="team_id" class="form-control select2">
                                        <option value="">Select Team</option>
                                        @foreach ($teams as $team)
                                            <option value="{{ $team->id }}"
                                                {{ old('team_id', $player->team_id) == $team->id ? 'selected' : '' }}>
                                                {{ $team->name }}
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
                                        placeholder="Enter Name" value="{{ old('name', $player->name) }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('email') has-error  @enderror">
                                    <label for="email">Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control form-control-sm" id="email"
                                        placeholder="Enter Email" value="{{ old('email', $player->email) }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('phone') has-error  @enderror">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control form-control-sm "
                                        id="phone" placeholder="Enter Phone" value="{{ old('phone', $player->phone) }}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('type') has-error  @enderror">
                                    <label for="type">Type<span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-control form-control-sm">
                                        <option value="">Select Type</option>
                                        <option value="1" {{ old('type', $player->type) == '1' ? 'selected' : '' }}>
                                            Captain
                                        </option>
                                        <option value="2" {{ old('type', $player->type) == '2' ? 'selected' : '' }}>
                                            Vice Captain
                                        </option>
                                        <option value="3" {{ old('type', $player->type) == '3' ? 'selected' : '' }}>
                                            Player
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
                                    <select name="player_type" id="player_type" class="form-control form-control-sm">
                                        <option value="">Select Player Type</option>
                                        <option value="Right Hand Bowler"
                                            {{ old('player_type', $player->player_type) == 'Right Hand Bowler' ? 'selected' : '' }}>
                                            Right Hand
                                            Bowler
                                        </option>
                                        <option value="Left Hand Bowler"
                                            {{ old('player_type', $player->player_type) == 'Left Hand Bowler' ? 'selected' : '' }}>
                                            Left Hand
                                            Bowler
                                        </option>
                                        <option value="Right Hand Batsman"
                                            {{ old('player_type', $player->player_type) == 'Right Hand Batsman' ? 'selected' : '' }}>
                                            Right Hand
                                            Batsman
                                        </option>
                                        <option value="Left Hand Batsman"
                                            {{ old('player_type', $player->player_type) == 'Left Hand Batsman' ? 'selected' : '' }}>
                                            Left Hand
                                            Batsman
                                        </option>
                                        <option value="Wicket Keeper Batsman"
                                            {{ old('player_type', $player->player_type) == 'Wicket Keeper Batsman' ? 'selected' : '' }}>
                                            Wicket Keeper
                                            Batsman
                                        </option>
                                        <option value="Wicket Keeper"
                                            {{ old('player_type', $player->player_type) == 'Wicket Keeper' ? 'selected' : '' }}>
                                            Wicket Keeper
                                        </option>
                                        <option value="All Rounder"
                                            {{ old('player_type', $player->player_type) == 'All Rounder' ? 'selected' : '' }}>
                                            All Rounder
                                        </option>
                                        <option value="Other"
                                            {{ old('player_type', $player->player_type) == 'Other' ? 'selected' : '' }}>
                                            Other
                                        </option>
                                    </select>
                                    @error('player_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
                            <div class="col-md-6">
                                <div class="form-group @error('active') has-error  @enderror">
                                    <label for="active">Active<span class="text-danger">*</span></label>
                                    <select class="form-select form-control form-control-sm" id="active"
                                        name="active">
                                        <option value="Y"
                                            {{ old('active', $player->active) == 'Y' ? 'selected' : '' }}>
                                            Yes</option>
                                        <option value="N"
                                            {{ old('active', $player->active) == 'N' ? 'selected' : '' }}>
                                            No</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row imagePreview" id="imagePreview">
                            @if ($player->image)
                                <div class="col-auto">
                                    <img src="{{ asset('storage/player_images/' . $player->image) }}"
                                        class="img-fluid img-thumbnail" alt="image Preview">
                                </div>
                            @endif
                        </div>


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
        });
    </script>
@endsection
