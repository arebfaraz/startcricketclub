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
                        <span>Slider</span>
                    </li>

                </ul>
            </div>
            @include('backend.inc.alert')

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Slider</h4>
                    <div class="d-flex gap-3">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Live Stream
                        </button>
                        <a href="{{ route('slider.create') }}" class="btn btn-primary btn-sm">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Add Slider
                        </a>

                    </div>

                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('saveStream') }}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Live Stream</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group @error('link') has-error  @enderror">
                                                <label for="link">Link<span class="text-danger">*</span></label>
                                                <input type="text" name="link" class="form-control " id="link"
                                                    placeholder="Enter Link" value="{{ old('link') }}">
                                                <div class="text-danger link_err"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 videoPreview" id="videoPreview">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="submitBtn" class="btn btn-primary" disabled>Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($sliders as $slider)
                                    <tr>
                                        <td>{{ $slider->title }}</td>
                                        <td>
                                            <div class="avatar avatar-xl">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('storage/slider_images/' . $slider->image) }}"
                                                    alt=""
                                                    onerror="this.onerror=null; this.src='{{ asset('backend/img/no_image.jpg') }}';">
                                            </div>
                                        </td>

                                        <td>
                                            @if ($slider->is_stream == '0')
                                                <a href="{{ route('slider.edit', $slider->id) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endif

                                            <span class="ms-4 cursor-pointer"
                                                onclick="confirm_delete('delete_{{ $slider->id }}')">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                                <form action="{{ route('slider.destroy', $slider->id) }}"
                                                    id="delete_{{ $slider->id }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Slider Found</td>
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
    <script>
        $(document).ready(function() {
            $("#link").on("change", function() {
                $("#videoPreview").empty();
                var videoLink = $(this).val().trim();
                getVideoLink(videoLink);
            })
        })

        function getVideoLink(videoLink) {
            if (isValidYouTubeLink(videoLink)) {
                var embedLink = convertToYouTubeEmbed(videoLink);
                if (embedLink) {
                    $("#link").val(embedLink);
                    $("#videoPreview").append(`
                    <div class="form-group">
                        <iframe src="${embedLink}" frameborder="0" allowfullscreen class="img-fluid img-thumbnail"></iframe>
                        </div>
                        `);
                    $("#submitBtn").attr('disabled', false);
                    $(".link_err").text('');

                } else {
                    $("#videoPreview").empty();
                    $("#submitBtn").attr('disabled', true);

                    $(".link_err").text('Invalid YouTube link');
                }
            } else {
                $("#videoPreview").empty();
                $("#submitBtn").attr('disabled', true);

                $(".link_err").text('Invalid YouTube link');
            }
        }

        // Function to check if the link is a valid YouTube link
        function isValidYouTubeLink(link) {
            var regex = /^(https?\:\/\/)?(www\.youtube\.com|youtu\.be)\/.+$/;
            return regex.test(link);
        }

        // Function to convert YouTube link to embedded link
        function convertToYouTubeEmbed(link) {
            var videoId = null;

            // Check for normal YouTube link and live stream link
            var regExp = /^.*(youtu\.be\/|v\/|\/u\/\w\/|embed\/|watch\?v=|\&v=|\/shorts\/|\/live\/)([^#\&\?]*).*/;
            var match = link.match(regExp);

            if (match && match[2].length == 11) {
                videoId = match[2];
            }

            if (videoId) {
                return `https://www.youtube.com/embed/${videoId}`;
            }

            return null;
        }
    </script>
@endsection
