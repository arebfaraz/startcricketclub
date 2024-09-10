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
                        <span>Player</span>
                    </li>

                </ul>
            </div>
            @include('backend.inc.alert')

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Player</h4>
                    <a href="{{ route('player.create') }}" class="btn btn-primary btn-sm">
                        <span class="btn-label">
                            <i class="fa fa-plus"></i>
                        </span>
                        Add Player
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Team</th>
                                    <th>Image</th>
                                    <th>Type</th>
                                    <th>Phone</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($players as $player)
                                    <tr>
                                        <td>{{ $player->name }}</td>
                                        <td>{{ $player->team->name }}</td>
                                        <td>
                                            <div class="avatar avatar-xl">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('storage/player_images/' . $player->image) }}"
                                                    alt=""
                                                    onerror="this.onerror=null; this.src='{{ asset('front/img/man-avatar.png') }}';">
                                            </div>
                                        </td>
                                        <td>{{ $player->type == '1' ? 'Captain' : ($player->type == '2' ? 'Vice Captain' : 'Player') }}
                                        </td>
                                        <td>{{ $player->phone ?? '-' }}</td>

                                        <td>
                                            {{ $player->active == 'Y' ? 'Yes' : 'No' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('player.edit', $player->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <span class="ms-4 cursor-pointer"
                                                onclick="confirm_delete('delete_{{ $player->id }}')">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                                <form action="{{ route('player.destroy', $player->id) }}"
                                                    id="delete_{{ $player->id }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Player Found</td>
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
