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
                        <a href="{{ route('match-result.index') }}">Result</a>
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
                    <h4 class="card-title">Update Result</h4>
                    <a href="{{ url()->previous() }}" class="btn btn-icon btn-round btn-primary">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('match-result.update', $result->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="card p-3">

                            <h3>Team 1 Data</h3>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group @error('team_1_id') has-error  @enderror">
                                        <label for="team_1_id">Team<span class="text-danger">*</span></label>
                                        <select name="team_1_id" id="team_1_id" class="form-control select2">
                                            <option value="">Select Team</option>
                                            @foreach ($teams as $team)
                                                <option value="{{ $team->id }}"
                                                    {{ old('team_1_id', $result->team_1_id) == $team->id ? 'selected' : '' }}>
                                                    {{ $team->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('team_1_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('team_1_score') has-error  @enderror">
                                        <label for="team_1_score">Score<span class="text-danger">*</span></label>
                                        <input type="text" name="team_1_score" class="form-control form-control-sm"
                                            id="team_1_score" placeholder="Enter Score"
                                            value="{{ old('team_1_score', $result->team_1_score) }}"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        @error('team_1_score')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('team_1_wicket') has-error  @enderror">
                                        <label for="team_1_wicket">Wicket Fallen<span class="text-danger">*</span></label>
                                        <input type="text" name="team_1_wicket" class="form-control form-control-sm"
                                            id="team_1_wicket" placeholder="Enter Wicket Fallen"
                                            value="{{ old('team_1_wicket', $result->team_1_wicket) }}"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                            oninput="validateWicket(this)">
                                        @error('team_1_wicket')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('team_1_over') has-error  @enderror">
                                        <label for="team_1_over">Over<span class="text-danger">*</span></label>
                                        <input type="text" name="team_1_over" class="form-control form-control-sm"
                                            id="team_1_over" placeholder="Enter Over"
                                            value="{{ old('team_1_over', $result->team_1_over) }}"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                            oninput="validateOver(this)">
                                        @error('team_1_over')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="card p-3">
                            <h3>Team 2 Data</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @error('team_2_id') has-error  @enderror">
                                        <label for="team_2_id">Team<span class="text-danger">*</span></label>
                                        <select name="team_2_id" id="team_2_id" class="form-control select2">
                                            <option value="">Select Team</option>
                                            @foreach ($teams as $team)
                                                <option value="{{ $team->id }}"
                                                    {{ old('team_2_id', $result->team_2_id) == $team->id ? 'selected' : '' }}>
                                                    {{ $team->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger" id="team-error" style="display:none;">Both teams cannot be
                                            the same!</div>
                                        @error('team_2_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('team_2_score') has-error  @enderror">
                                        <label for="team_2_score">Score<span class="text-danger">*</span></label>
                                        <input type="text" name="team_2_score" class="form-control form-control-sm"
                                            id="team_2_score" placeholder="Enter Score"
                                            value="{{ old('team_2_score', $result->team_2_score) }}"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                        @error('team_2_score')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('team_2_wicket') has-error  @enderror">
                                        <label for="team_2_wicket">Wicket Fallen<span class="text-danger">*</span></label>
                                        <input type="text" name="team_2_wicket" class="form-control form-control-sm"
                                            id="team_2_wicket" placeholder="Enter Wicket Fallen"
                                            value="{{ old('team_2_wicket', $result->team_2_wicket) }}"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                            oninput="validateWicket(this)">
                                        @error('team_2_wicket')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('team_2_over') has-error  @enderror">
                                        <label for="team_2_over">Over<span class="text-danger">*</span></label>
                                        <input type="text" name="team_2_over" class="form-control form-control-sm"
                                            id="team_2_over" placeholder="Enter Over"
                                            value="{{ old('team_2_over', $result->team_2_over) }}"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                            oninput="validateOver(this)">
                                        @error('team_2_over')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="card p-3">
                            <h3>Result</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @error('won_team_id') has-error  @enderror">
                                        <label for="won_team_id">Won Team<span class="text-danger">*</span></label>
                                        <select name="won_team_id" id="won_team_id" class="form-control select2">
                                            <option value="">Select Team</option>

                                        </select>
                                        @error('won_team_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('won_by') has-error  @enderror">
                                        <label for="won_by">Won By<span class="text-danger">*</span></label>
                                        <select name="won_by" id="won_by" class="form-control form-control-sm">
                                            <option value="">Select</option>
                                            <option value="1"
                                                {{ old('won_by', $result->won_by) == '1' ? 'selected' : '' }}>Run
                                            </option>
                                            <option value="2"
                                                {{ old('won_by', $result->won_by) == '2' ? 'selected' : '' }}>Wicket
                                            </option>

                                        </select>
                                        @error('won_by')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 {{ old('won_by') || $result->won_by ?: 'd-none' }}" id="wonDiv">
                                    <div class="form-group @error('won_by_no') has-error  @enderror">
                                        <label for="won_by_no"
                                            id="won_label">{{ old('won_by') && old('won_by') == '1' ? 'Run' : (old('won_by') && old('won_by') == '2' ? 'Wicket' : '') }}</label>
                                        <input type="text" name="won_by_no" class="form-control form-control-sm"
                                            id="won_by_no" value="{{ old('won_by_no', $result->won_by_no) }}"
                                            placeholder="{{ old('won_by') && old('won_by') == '1' ? 'Enter Run' : (old('won_by') && old('won_by') == '2' ? 'Enter Wicket' : '') }}"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                            oninput="validateWonBy(this)">
                                        @error('won_by_no')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
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

            $(document).ready(function() {
                function updateWonTeamDropdown() {
                    var team1 = $('#team_1_id').val();
                    var team2 = $('#team_2_id').val();
                    var won_team =
                    "{{ old('won_team_id', $result->won_team_id) }}"; // Get the previously selected team

                    // Clear the won_team_id dropdown
                    $('#won_team_id').empty();
                    $('#won_team_id').append('<option value="">Select Team</option>');

                    // If both teams are selected and different, populate the won_team_id dropdown
                    if (team1 && team2 && team1 !== team2) {
                        $('#won_team_id').append('<option value="' + team1 + '"' + (won_team == team1 ?
                                ' selected' : '') + '>' +
                            $("#team_1_id option:selected").text() + '</option>');
                        $('#won_team_id').append('<option value="' + team2 + '"' + (won_team == team2 ?
                                ' selected' : '') + '>' +
                            $("#team_2_id option:selected").text() + '</option>');

                        $("#team-error").hide(); // Hide the error message if both teams are different
                    } else if (team1 && team2 && team1 === team2) {
                        // Show error if both teams are the same
                        $("#team-error").show();
                    } else {
                        $("#team-error").hide(); // Hide the error message when the teams are not the same
                    }
                }

                // Trigger the update when either team_1_id or team_2_id is changed
                $('#team_1_id, #team_2_id').on('change', function() {
                    updateWonTeamDropdown();
                });

                // Trigger the update on page load in case old values exist
                updateWonTeamDropdown();

                // Trigger the update when either team_1_id or team_2_id is changed
                $('#team_1_id, #team_2_id').on('change', function() {
                    updateWonTeamDropdown();
                });


                // Trigger the update on page load in case old values exist
                updateWonTeamDropdown();

                $('#won_by').on('change', function() {
                    const wonByNo = $("#won_by_no");
                    const label = $("#won_label");
                    $("#wonDiv").removeClass('d-none');
                    if ($(this).val() === '1') {
                        wonByNo.attr('placeholder', 'Enter Run').val('');
                        label.empty().append('Run<span class="text-danger">*</span>');
                    } else if ($(this).val() === '2') {
                        wonByNo.attr('placeholder', 'Enter Wicket').val('');
                        label.empty().append(`Wicket<span class="text-danger">*</span>`);


                    }
                });
            });

        });

        function validateWicket(input) {
            var value = parseInt(input.value);

            if (value < 1) {
                input.value = 1; // Set minimum to 1
            } else if (value > 10) {
                input.value = 10; // Set maximum to 10
            }
        }

        function validateOver(input) {
            var value = parseInt(input.value);

            if (value < 1) {
                input.value = 1; // Set minimum to 1
            } else if (value > 50) {
                input.value = 50; // Set maximum to 10
            }
        }

        function validateWonBy(input) {
            var value = parseInt(input.value);
            var wonBy = $('#won_by').val();
            if (wonBy == '2') {

                if (value < 1) {
                    input.value = 1; // Set minimum to 1
                } else if (value > 10) {
                    input.value = 10; // Set maximum to 10
                }
            }
        }
    </script>
@endsection
