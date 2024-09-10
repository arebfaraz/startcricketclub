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
                        <span>Team</span>
                    </li>

                </ul>
            </div>
            @include('backend.inc.alert')

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Team</h4>
                    <a href="{{ route('team.create') }}" class="btn btn-primary btn-sm">
                        <span class="btn-label">
                            <i class="fa fa-plus"></i>
                        </span>
                        Add Team
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Logo</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($teams as $team)
                                    <tr>
                                        <td>{{ $team->name }}</td>
                                        <td>
                                            <div class="avatar avatar-xl">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('storage/team_logos/' . $team->logo) }}" alt=""
                                                    onerror="this.onerror=null; this.src='{{ asset('backend/img/no_image.jpg') }}';">
                                            </div>
                                        </td>
                                        <td>
                                            {{ $team->active == 'Y' ? 'Yes' : 'No' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('team.edit', $team->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <span class="ms-4 cursor-pointer"
                                                onclick="confirm_delete('delete_{{ $team->id }}')">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                                <form action="{{ route('team.destroy', $team->id) }}"
                                                    id="delete_{{ $team->id }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Team Found</td>
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
