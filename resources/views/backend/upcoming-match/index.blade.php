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
                        <span>Upcoming Match</span>
                    </li>

                </ul>
            </div>
            @include('backend.inc.alert')

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Upcoming Match</h4>
                    <a href="{{ route('upcoming-match.create') }}" class="btn btn-primary btn-sm">
                        <span class="btn-label">
                            <i class="fa fa-plus"></i>
                        </span>
                        Add Upcoming Match
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Team 1</th>
                                    <th>Team 2</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($matches as $match)
                                    <tr>
                                        <td>{{ @$match->team_1->name }}</td>
                                        <td>{{ @$match->team_2->name }}</td>
                                        <td>{{ $match->type }}</td>
                                        <td>{{ \Carbon\Carbon::parse($match->date)->format('d M, Y') }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $match->time)->format('h:i A') }}
                                        </td>
                                        <td>{{ $match->location }}</td>
                                        <td>
                                            <a href="{{ route('upcoming-match.edit', $match->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <span class="ms-4 cursor-pointer"
                                                onclick="confirm_delete('delete_{{ $match->id }}')">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                                <form action="{{ route('upcoming-match.destroy', $match->id) }}"
                                                    id="delete_{{ $match->id }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Upcoming Match Found</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
