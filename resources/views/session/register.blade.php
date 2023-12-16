@extends('layout/mainclear')

@section('content')
    <div class="w-50 center border rounded p-5 mx-auto mt-4">
        <div class="row justify-content-between">
            <div class="col">
                <h2 class="mb-4">Register</h2>
            </div>
            <div class="col-auto">
                <a href="/" class="btn color-yellow">< Kembali</a>
            </div>
        </div>

        @include('component/message')
        <form action="/create" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="name" value="{{ Session::get('name') }}" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3 d-grid">
                <button class="btn btn-primary" name="submit" type="submit">Register</button>
            </div>
        </form>
    </div>
@endsection