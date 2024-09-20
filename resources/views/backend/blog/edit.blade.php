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
                        <a href="{{ route('blog.index') }}">Blog</a>
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
                    <h4 class="card-title">Update Blog</h4>
                    <a href="{{ url()->previous() }}" class="btn btn-icon btn-round btn-primary">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('title') has-error  @enderror">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control " id="title"
                                        placeholder="Enter Title" value="{{ old('title', $blog->title) }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('type') has-error  @enderror">
                                    <label for="type">Type<span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="1" {{ old('type', $blog->type) == '1' ? 'selected' : '' }}>Blog
                                        </option>
                                        <option value="2" {{ old('type', $blog->type) == '2' ? 'selected' : '' }}>Event
                                        </option>
                                        <option value="3" {{ old('type', $blog->type) == '3' ? 'selected' : '' }}>
                                            Promotion</option>
                                    </select>
                                    @error('type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('date') has-error  @enderror">
                                    <label for="date">Date<span class="text-danger">*</span></label>
                                    <input type="date" name="date" class="form-control" id="date"
                                        value="{{ old('date', $blog->date) }}">
                                    @error('date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('active') has-error  @enderror">
                                    <label for="active">Active<span class="text-danger">*</span></label>
                                    <select class="form-select form-control" id="active" name="active">
                                        <option value="Y" {{ old('active', $blog->active) == 'Y' ? 'selected' : '' }}>
                                            Yes</option>
                                        <option value="N" {{ old('active', $blog->active) == 'N' ? 'selected' : '' }}>
                                            No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group @error('image') has-error  @enderror">
                                    <label for="image">Image<span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control" id="image"
                                        accept="image/*">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 imagePreview" id="imagePreview">
                                @if ($blog->image)
                                    <div class="p-2">
                                        <img src="{{ asset('storage/blog_images/' . $blog->image) }}"
                                            class="img-fluid img-thumbnail" height="100" width="100"
                                            alt="image Preview">
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <div class="form-group @error('description') has-error  @enderror">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description">{{ old('description', $blog->description) }}</textarea>
                                    @error('description')
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

            $("#description").summernote({
                height: 400,
            });

            $("#image").on("change", function() {
                $("#imagePreview").empty(); // Clear previous previews

                var files = this.files; // Get the selected files

                if (files.length > 0) {
                    $.each(files, function(i, file) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $("#imagePreview").append(`
                        <div class="p-2">
                            <img src="${e.target.result}" class="img-fluid img-thumbnail" height="100" width="100" alt="image Preview">
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
