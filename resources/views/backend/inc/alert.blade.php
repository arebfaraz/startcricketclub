@if (Session::has('message'))
    <div class="alert alert-info col-12 p-3 mt-3">
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p class="mb-0">{!! Session::get('message') !!}</p>
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success col-12 p-3 mt-3">
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p class="mb-0">{!! Session::get('success') !!}</p>
    </div>
@endif
@if (Session::has('warnings'))
    <div class="alert alert-warnings col-12 p-3 mt-3">
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p class="mb-0">{!! Session::get('warnings') !!}</p>
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger col-12 p-3 mt-3">
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p class="mb-0">{!! Session::get('error') !!}</p>
    </div>
@elseif (count($errors) > 0)
    <div class="alert alert-danger col-12 p-3 mt-3">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
