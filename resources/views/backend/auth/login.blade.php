@extends('backend.layouts.guest')

@section('content')
    <div class="row justify-content-center">

        <div class="card col-md-4 mt-5 ">
            @include('backend.inc.alert')
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Login</h4>

            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Email</label>
                        <input type="email" class="form-control form-control-lg" name="email" id="exampleInputEmail1"
                            placeholder="Email" value="{{ old('email') }}">
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example4">Password</label>
                        <input type="password" class="form-control form-control-lg" name="password"
                            id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-small btn-primary mt-3">Sign In</button>

                </form>
            </div>
        </div>
    </div>

    <!-- Section: Design Block -->
@endsection
