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
                        <span>Blog</span>
                    </li>

                </ul>
            </div>
            @include('backend.inc.alert')

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Blog</h4>
                    <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm">
                        <span class="btn-label">
                            <i class="fa fa-plus"></i>
                        </span>
                        Add Blog
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Type</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($blogs as $blog)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($blog->date)->format('d M, Y') }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>
                                            <div class="avatar avatar-xl">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('storage/blog_images/' . $blog->image) }}" alt=""
                                                    onerror="this.onerror=null; this.src='{{ asset('backend/img/no_image.jpg') }}';">
                                            </div>
                                        </td>
                                        <td>
                                            {{ $blog->type == '1' ? 'Blog' : ($blog->type == '2' ? 'Event' : 'Promotion') }}
                                        </td>
                                        <td>
                                            {{ $blog->active == 'Y' ? 'Yes' : 'No' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('blog.edit', $blog->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <span class="ms-4 cursor-pointer"
                                                onclick="confirm_delete('delete_{{ $blog->id }}')">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                                <form action="{{ route('blog.destroy', $blog->id) }}"
                                                    id="delete_{{ $blog->id }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No Blog Found</td>
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
