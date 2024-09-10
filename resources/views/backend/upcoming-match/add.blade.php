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
                        <a href="{{ route('upcoming-match.index') }}">Upcoming Match</a>
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
                    <h4 class="card-title">Add Upcoming Match</h4>
                    <a href="{{ url()->previous() }}" class="btn btn-icon btn-round btn-primary">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('upcoming-match.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('team_1_id') has-error  @enderror">
                                    <label for="team_1_id">Team 1<span class="text-danger">*</span></label>
                                    <select name="team_1_id" id="team_1_id" class="form-control select2">
                                        <option value="">Select Team</option>
                                        @foreach ($teams as $team)
                                            <option value="{{ $team->id }}"
                                                {{ old('team_1_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('team_1_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('team_2_id') has-error  @enderror">
                                    <label for="team_2_id">Team 2<span class="text-danger">*</span></label>
                                    <select name="team_2_id" id="team_2_id" class="form-control select2">
                                        <option value="">Select Team</option>
                                        @foreach ($teams as $team)
                                            <option value="{{ $team->id }}"
                                                {{ old('team_2_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('team_2_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('type') has-error  @enderror">
                                    <label for="type">Type<span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-control form-control-sm">
                                        <option value="">Select Type</option>
                                        <option value="T20 Match" {{ old('type') == 'T20 Match' ? 'selected' : '' }}>
                                            T20 Match
                                        </option>
                                        <option value="One Day Match"
                                            {{ old('type') == 'One Day Match' ? 'selected' : '' }}>
                                            One Day Match
                                        </option>
                                        <option value="Test Match" {{ old('type') == 'Test Match' ? 'selected' : '' }}>
                                            Test Match
                                        </option>
                                    </select>
                                    @error('type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('location') has-error  @enderror">
                                    <label for="location">Location<span class="text-danger">*</span></label>
                                    <input type="text" name="location" class="form-control form-control-sm"
                                        id="location" placeholder="Enter Name"
                                        value="{{ old('location', 'AZ Oval Stadium , Phnom Penh') }}">
                                    @error('location')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group @error('date') has-error  @enderror">
                                    <label for="date">Date<span class="text-danger">*</span></label>
                                    <input type="date" name="date" class="form-control form-control-sm "
                                        id="date" value="{{ old('date') }}"
                                        min="{{ \Carbon\Carbon::today()->toDateString() }}">
                                    @error('date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('time') has-error  @enderror">
                                    <label for="time">Date<span class="text-danger">*</span></label>
                                    <input type="time" name="time" class="form-control form-control-sm "
                                        id="time" value="{{ old('time') }}">
                                    @error('time')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
        });
    </script>
@endsection
