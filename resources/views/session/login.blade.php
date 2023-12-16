@extends('layout/mainclear')

@section('content')
    <div class="w-50 center border rounded p-5 mx-auto mt-5">
        <div class="row justify-content-between">
            <div class="col">
                <h2 class="mb-4">Login</h2>
            </div>
            <div class="col-auto">
                <a href="/" class="btn color-yellow">< Kembali</a>
            </div>
        </div>

        @include('component/message')
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input required type="email" value="{{ Session::get('email') }}" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input required type="password" name="password" class="form-control">
            </div>

            <div class="mb-3 d-grid mt-4">
                <button class="btn btn-primary py-2" name="submit" type="submit">Login</button>
            </div>
        </form>
    </div>
@endsection