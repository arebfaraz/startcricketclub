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
                        <span>Membership</span>
                    </li>

                </ul>
            </div>
            @include('backend.inc.alert')

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Membership</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover basic-datatables">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Phone</th>
                                    <th>Payment <br>
                                        Receipt</th>
                                    <th>Payment <br>
                                        Confirmation</th>
                                    <th>Team Assign</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($memberships as $memberships)
                                    <tr>
                                        <td>{{ $memberships->sr_no ?? '-' }}</td>
                                        <td>{{ $memberships->name }}</td>
                                        <td>
                                            <div class="avatar avatar-xl">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('storage/player_images/' . $memberships->image) }}"
                                                    alt=""
                                                    onerror="this.onerror=null; this.src='{{ asset('front/img/12.avif') }}';">
                                            </div>
                                        </td>
                                        <td>{{ $memberships->phone ?? '-' }}</td>
                                        <td>
                                            @if ($memberships->payment_screenshot)
                                                <a href="{{ asset('storage/payments/' . $memberships->payment_screenshot) }}"
                                                    target="_blank">
                                                    <img src="{{ asset('storage/payments/' . $memberships->payment_screenshot) }}"
                                                        width="100"></a>
                                            @else
                                                <span class="text-danger">No Payment Recieve</span>
                                            @endif
                                        </td>
                                        <td>
                                            <label class="toggle-switch">
                                                <input type="checkbox"
                                                    onclick="paymentStatus({{ $memberships->id }},'{{ $memberships->is_payment }}')"
                                                    name="default" value="{{ $memberships->id }}"
                                                    {{ $memberships->is_payment == 'Y' ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-bs-toggle="modal"
                                                data-bs-target="#teamAssignModal"
                                                onclick="teamAssign({{ $memberships->id }})"
                                                {{ $memberships->is_payment == 'Y' ?: 'disabled' }}>Assign</button>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Membership Found</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="teamAssignModal" tabindex="-1" aria-labelledby="teamAssignModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="teamAssignModalLabel">Team Assign</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('teamAssign') }}" method="post" id="team-assign-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('team_id') has-error  @enderror">
                                    <label for="team_id">Team<span class="text-danger">*</span></label>
                                    <select name="team_id" id="team_id" class="form-control select2">
                                        <option value="">Select Team</option>
                                        @foreach ($teams as $team)
                                            <option value="{{ $team->id }}">{{ $team->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger team_err"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('type') has-error  @enderror">
                                    <label for="type">Type<span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>Captain
                                        </option>
                                        <option value="2" {{ old('type') == '2' ? 'selected' : '' }}>Vice Captain
                                        </option>
                                        <option value="3" {{ old('type') == '3' ? 'selected' : '' }}>Player
                                        </option>
                                    </select>
                                    <div class="text-danger type_err"></div>
                                </div>
                            </div>
                            <input type="hidden" id="player_id" name="player_id">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="team-submit-btn">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function paymentStatus(id, is_payment) {
            var msg = is_payment == 'Y' ? 'unconfirm' : 'confirm';
            swal({
                title: "Are you sure?",
                text: "You want to " + msg + " the payment!",
                icon: "warning",
                buttons: {
                    confirm: {
                        text: "Yes",
                        className: "btn btn-success",
                    },
                    cancel: {
                        visible: true,
                        className: "btn btn-danger",
                    },
                },
            }).then((result) => {
                if (result) {
                    // User clicked "Yes"
                    $.ajax({
                        url: "{{ route('paymentStatus') }}",
                        method: "GET",
                        data: {
                            id: id,
                        },
                        dataType: "json", // Change the data type as needed
                        success: function(response) {
                            swal({
                                title: response.success,
                                icon: "success",
                            }).then((res) => {
                                if (res) {
                                    location
                                        .reload(); // Reload the page when "OK" is clicked after success
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                        }
                    });
                } else {
                    // User clicked "Cancel"
                    location.reload(); // Reload the page when "Cancel" is clicked
                }
            });


        }

        function teamAssign(id) {
            $("#player_id").val(id);
        }


        $(document).ready(function() {


            $("#team-submit-btn").on("click", function() {

                var team_id = $('#team_id').val();
                var type = $('#type').val();
                if (team_id && type) {
                    $("#team-assign-form").submit();
                } else if (!team_id && !type) {
                    $(".team_err").text('Please choose team');
                    $(".type_err").text('Please choose type');
                } else if (!team_id) {
                    $(".team_err").text('Please choose team');
                    $(".type_err").text('');

                } else if (!type) {
                    $(".type_err").text('Please choose type');
                    $(".team_err").text('');

                }
            });
        });
    </script>
@endsection
