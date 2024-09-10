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
                        <a href="{{ route('slider.index') }}">Slider</a>
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
                    <h4 class="card-title">Update Slider</h4>
                    <a href="{{ url()->previous() }}" class="btn btn-icon btn-round btn-primary">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('slider.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('title') has-error  @enderror">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control " id="title"
                                        placeholder="Enter Title" value="{{ old('title', $slider->title) }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group @error('image') has-error  @enderror">
                                    <label for="image">Image<span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control" id="image"
                                        accept="image/*">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2 imagePreview" id="imagePreview">
                                @if ($slider->image)
                                    <div class="col-auto">
                                        <img src="{{ asset('storage/slider_images/' . $slider->image) }}"
                                            class="img-fluid img-thumbnail" height="100" width="100"
                                            alt="Image Preview">
                                    </div>
                                @endif
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group @error('image') has-error  @enderror">
                                    <label for="image">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{ old('description', $slider->description) }}
                                    </textarea>
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

            $("#image").on("change", function() {
                $("#imagePreview").empty(); // Clear previous previews

                var files = this.files; // Get the selected files

                if (files.length > 0) {
                    $.each(files, function(i, file) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $("#imagePreview").append(`
                        <div class="col-auto">
                            <img src="${e.target.result}" class="img-fluid img-thumbnail" height="100" width="100" alt="Image Preview">
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
