<header class="p-3 bg-primary text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img height="40px" width="40px" src="{{ url('quized-logo.svg') }}" alt="">
                <strong class="fs-3 ms-2">Quized</strong>
            </a>

            <div class="text-center text-lg-start">
                <p class="mb-0">Halo, {{ Auth::user()->name }}!</p>
            </div>

            <div class="text-end">
                <a href="/material" class="btn btn-outline-light me-2">List Materi</a>
                @if (Auth::check())
                    <a href="/logout" class="btn btn-outline-light">Logout</a>
                @else
                    <a href="/login" class="btn btn-outline-light me-2">Login</a>
                    <a href="/register" class="btn btn-outline-light">Daftar</a>
                @endif
            </div>
        </div>
    </div>
</header>
