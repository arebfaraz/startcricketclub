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
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Registration Date</th>
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
                                @forelse ($memberships as $membership)
                                    <tr>
                                        <td>{{ $membership->created_at->format('d M, Y') }}</td>
                                        <td>{{ $membership->sr_no ?? '-' }}</td>
                                        <td>{{ $membership->name }}</td>
                                        <td>
                                            <div class="avatar avatar-xl">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('storage/player_images/' . $membership->image) }}"
                                                    alt=""
                                                    onerror="this.onerror=null; this.src='{{ asset('front/img/12.avif') }}';">
                                            </div>
                                        </td>
                                        <td>{{ $membership->phone ?? '-' }}</td>
                                        <td>
                                            @if ($membership->payment_screenshot)
                                                <a href="{{ asset('storage/payments/' . $membership->payment_screenshot) }}"
                                                    target="_blank">
                                                    <img src="{{ asset('storage/payments/' . $membership->payment_screenshot) }}"
                                                        width="100"></a>
                                            @else
                                                <span class="text-danger">No Payment Receipt</span>
                                            @endif
                                        </td>
                                        <td>
                                            <label class="toggle-switch">
                                                <input type="checkbox" onclick="paymentStatus({{ $membership->id }})"
                                                    id="payemnt_{{ $membership->id }}" name="default"
                                                    value="{{ $membership->id }}"
                                                    {{ $membership->current_month_payment ? 'checked disabled' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-bs-toggle="modal"
                                                data-bs-target="#teamAssignModal"
                                                onclick="teamAssign({{ $membership->id }})"
                                                {{ $membership->team_id || !$membership->current_month_payment ? 'disabled' : '' }}>Assign</button>
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


    <!--Team Modal -->
    <div class="modal fade" id="teamAssignModal" tabindex="-1" aria-labelledby="teamAssignModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
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
                            <input type="hidden" class="player_id" name="player_id">
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

    <!--Payment Modal -->
    <div class="modal fade" id="paymentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="paymentModalLabel">Payment</h1>
                    <button type="button" class="btn-close close-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('paymentStatus') }}" method="post" id="payment-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount">Amount<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="amount" id="amount"
                                        value="15">
                                    <div class="text-danger amount_err"></div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="payment_date" id="date"
                                        value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                    <div class="text-danger date_err"></div>

                                </div>
                            </div>

                            <input type="hidden" class="player_id" name="player_id">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="payment-submit-btn">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function paymentStatus(id) {
            // Set the player ID in the hidden input field of the modal
            $(".player_id").val(id);

            // Use Bootstrap's modal method to show the modal
            $('#paymentModal').modal('show');

        }

        function teamAssign(id) {
            $(".player_id").val(id);
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

            $(".close-btn").on("click", function() {
                var id = $(".player_id").val();

                // Uncheck and enable the checkbox for this player
                $("#payemnt_" + id).prop('checked', false).prop('disabled', false);

                // Clear the player ID for future use
                $(".player_id").val('');
            })

            $("#payment-submit-btn").on("click", function() {

                var date = $('#date').val();
                var amount = $('#amount').val();
                if (date && amount) {
                    $("#payment-form").submit();
                } else if (!date && !amount) {
                    $(".date_err").text('Date field is required');
                    $(".amount_err").text('Amount field is required');
                } else if (!date) {
                    $(".date_err").text('Date field is required');
                    $(".amount_err").text('');

                } else if (!amount) {
                    $(".amount_err").text('Amount field is required');
                    $(".date_err").text('');

                }
            });
        });
    </script>
@endsection
