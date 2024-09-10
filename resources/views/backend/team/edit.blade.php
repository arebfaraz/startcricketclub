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
                        <a href="{{ route('team.index') }}">Team</a>
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
                    <h4 class="card-title">Update Team</h4>
                    <a href="{{ url()->previous() }}" class="btn btn-icon btn-round btn-primary">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('team.update', $team->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('name') has-error  @enderror">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control " id="name"
                                        placeholder="Enter Name" value="{{ old('name', $team->name) }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('active') has-error  @enderror">
                                    <label for="active">Active<span class="text-danger">*</span></label>
                                    <select class="form-select form-control" id="active" name="active">
                                        <option value="Y" {{ old('active', $team->active) == 'Y' ? 'selected' : '' }}>
                                            Yes</option>
                                        <option value="N" {{ old('active', $team->active) == 'N' ? 'selected' : '' }}>
                                            No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group @error('logo') has-error  @enderror">
                                    <label for="logo">Logo</label>
                                    <input type="file" name="logo" class="form-control" id="logo"
                                        accept="image/*">
                                    @error('logo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="row logoPreview" id="logoPreview">
                            @if ($team->logo)
                                <div class="col-auto">
                                    <img src="{{ asset('storage/team_logos/' . $team->logo) }}"
                                        class="img-fluid img-thumbnail" alt="logo Preview" width="100" height="100">
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
            $("#logo").on("change", function() {
                $("#logoPreview").empty(); // Clear previous previews

                var files = this.files; // Get the selected files

                if (files.length > 0) {
                    $.each(files, function(i, file) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $("#logoPreview").append(`
                        <div class="col-auto">
                            <img src="${e.target.result}" class="img-fluid img-thumbnail" height="100" width="100" alt="logo Preview">
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
