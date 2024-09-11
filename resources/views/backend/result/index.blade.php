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
                        <span>Result</span>
                    </li>

                </ul>
            </div>
            @include('backend.inc.alert')

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Result</h4>
                    <a href="{{ route('match-result.create') }}" class="btn btn-primary btn-sm">
                        <span class="btn-label">
                            <i class="fa fa-plus"></i>
                        </span>
                        Add Result
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Team 1</th>
                                    <th>Team 2</th>
                                    <th>Won</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($results as $result)
                                    <tr>
                                        <td>{{ $result->team_1->name }}</td>
                                        <td>{{ $result->team_2->name }}</td>
                                        <td>{{ $result->won_team->name }}</td>

                                        <td>
                                            <a href="{{ route('match-result.edit', $result->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <span class="ms-4 cursor-pointer"
                                                onclick="confirm_delete('delete_{{ $result->id }}')">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                                <form action="{{ route('match-result.destroy', $result->id) }}"
                                                    id="delete_{{ $result->id }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Result Found</td>
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
