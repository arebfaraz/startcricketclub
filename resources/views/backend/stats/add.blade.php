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
                        <span>Stats</span>
                    </li>

                </ul>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Stats Of {{ $player->name }}</h4>
                    <a href="{{ url()->previous() }}" class="btn btn-icon btn-round btn-primary">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('player-stats.update', $player->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group @error('matches') has-error  @enderror">
                                    <label for="matches">Match</label>
                                    <input type="text" name="matches" class="form-control form-control-sm" id="matches"
                                        placeholder="Enter Match" value="{{ old('matches', @$stats->matches) }}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('matches')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('innings') has-error  @enderror">
                                    <label for="innings">Inning</label>
                                    <input type="text" name="innings"
                                        class="form-control form-control-sm calculate-average" id="innings"
                                        placeholder="Enter Inning" value="{{ old('innings', @$stats->innings) }}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('innings')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('runs') has-error  @enderror">
                                    <label for="runs">Run</label>
                                    <input type="text" name="runs"
                                        class="form-control form-control-sm calculate-average" id="runs"
                                        placeholder="Enter Run" value="{{ old('runs', @$stats->runs) }}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('runs')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('average') has-error  @enderror">
                                    <label for="average">Average</label>
                                    <input type="text" name="average" class="form-control form-control-sm" id="average"
                                        placeholder="Enter Average" value="{{ old('average', @$stats->average) }}"
                                        onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46">

                                    @error('average')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('overs') has-error  @enderror">
                                    <label for="overs">Over</label>
                                    <input type="text" name="overs" class="form-control form-control-sm "
                                        id="overs" placeholder="Enter Over" value="{{ old('overs', @$stats->overs) }}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('overs')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('wickets') has-error  @enderror">
                                    <label for="wickets">Wicket</label>
                                    <input type="text" name="wickets" class="form-control form-control-sm "
                                        id="wickets" placeholder="Enter Wicket"
                                        value="{{ old('wickets', @$stats->wickets) }}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('wickets')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('strike_rate') has-error  @enderror">
                                    <label for="strike_rate">Strike Rate</label>
                                    <input type="text" name="strike_rate" class="form-control form-control-sm"
                                        id="strike_rate" placeholder="Enter Strike Rate"
                                        value="{{ old('strike_rate', @$stats->strike_rate) }}"
                                        onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46">

                                    @error('strike_rate')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('highest_runs') has-error  @enderror">
                                    <label for="highest_runs">Highest Run</label>
                                    <input type="text" name="highest_runs" class="form-control form-control-sm"
                                        id="highest_runs" placeholder="Enter Highest Run"
                                        value="{{ old('highest_runs', @$stats->highest_runs) }}">

                                    @error('highest_runs')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('catches') has-error  @enderror">
                                    <label for="catches">Catch</label>
                                    <input type="text" name="catches" class="form-control form-control-sm "
                                        id="catches" placeholder="Enter Catch"
                                        value="{{ old('catches', @$stats->catches) }}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('catches')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('fours') has-error  @enderror">
                                    <label for="fours">4s</label>
                                    <input type="text" name="fours" class="form-control form-control-sm "
                                        id="fours" placeholder="Enter fours"
                                        value="{{ old('fours', @$stats->fours) }}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('fours')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('sixes') has-error  @enderror">
                                    <label for="sixes">6s</label>
                                    <input type="text" name="sixes" class="form-control form-control-sm "
                                        id="sixes" placeholder="Enter sixes"
                                        value="{{ old('sixes', @$stats->sixes) }}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('sixes')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('fifties') has-error  @enderror">
                                    <label for="fifties">50s</label>
                                    <input type="text" name="fifties" class="form-control form-control-sm "
                                        id="fifties" placeholder="Enter fifties"
                                        value="{{ old('fifties', @$stats->fifties) }}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('fifties')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('hundreds') has-error  @enderror">
                                    <label for="hundreds">100s</label>
                                    <input type="text" name="hundreds" class="form-control form-control-sm "
                                        id="hundreds" placeholder="Enter hundreds"
                                        value="{{ old('hundreds', @$stats->hundreds) }}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    @error('hundreds')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group @error('economy') has-error  @enderror">
                                    <label for="economy">Bowling Economy</label>
                                    <input type="text" name="economy" class="form-control form-control-sm"
                                        id="economy" placeholder="Enter Bowling Economy"
                                        value="{{ old('economy', @$stats->economy) }}"
                                        onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46">

                                    @error('economy')
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
            $('.calculate-average').on('keyup', function() {
                var innings = parseFloat($("#innings").val());
                var runs = parseFloat($("#runs").val());

                if (innings && runs) {
                    var average = runs / innings;

                    if (!Number.isInteger(average)) {
                        average = average.toFixed(2);
                    }

                    $("#average").val(average);
                } else {
                    $("#average").val('');
                }
            });


        })
    </script>
@endsection
