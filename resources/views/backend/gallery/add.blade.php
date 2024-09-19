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
                        <a href="{{ route('team.index') }}">Gallery</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <span>Add</span>
                    </li>

                </ul>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Add Gallery</h4>
                    <a href="{{ url()->previous() }}" class="btn btn-icon btn-round btn-primary">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <label for="logo">Gallery</label>

                            <div id="inputContainer" class="col-md-12 row ">

                                <div class="form-group col-6">
                                    <input type="file" name="gallery[]" data-id="galleryPreview-0"
                                        class="form-control gallery" accept="image/*">

                                </div>

                                <div class="col-6 mb-3" id="galleryPreview-0"></div>
                            </div>
                            @error('gallery')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-12 mb-3 d-flex align-items-center gap-4">
                                <button type="button" id="addButton" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>


                        </div>




                        <div class="row">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Submit
                                </button>
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
            var counter = 1; // Initialize a counter for unique IDs

            $('#addButton').click(function() {
                // Duplicate the input field with a delete button and append it to the container
                var lastInputVal = $('#inputContainer input[type="file"]').last().val();

                // Check if the input is empty
                if ($.trim(lastInputVal) === '') {
                    alert('Please add gallery before adding a new one.');
                } else {
                    counter++; // Increment the counter for unique IDs

                    var newInput = '<div class="form-group col-6">' +
                        '<input type="file" name="gallery[]" class="form-control gallery" data-id="galleryPreview-' +
                        counter + '" accept="image/*">' +
                        '</div>' +
                        '<div class="col-6 mb-3" id="galleryPreview-' + counter + '"></div>';

                    $('#inputContainer').append(newInput);
                }
            });

            // Use event delegation to bind the change event for dynamically added inputs
            $('#inputContainer').on('change', '.gallery', function() {
                var id = $(this).data('id');
                console.log(id, 'id');

                $("#" + id).empty(); // Clear previous previews

                var files = this.files; // Get the selected files

                if (files.length > 0) {
                    $.each(files, function(i, file) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $("#" + id).append(`
                        <img src="${e.target.result}" class="img-fluid img-thumbnail" height="100" width="100" alt="Preview">
                    `);
                        };

                        reader.readAsDataURL(file); // Read the file as a data URL
                    });
                }
            });
        });
    </script>
@endsection
