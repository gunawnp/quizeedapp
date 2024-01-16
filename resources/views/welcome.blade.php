@extends('layout/mainclear')

@section('content')
    <div class="container py-3">
        <div class="row my-5">
            <div class="col d-flex align-items-center">
                <main class="content-wrapper text-center">
                    <h1>ACI Quiz</h1>
                    <p class="fs-5">Website aplikasi ini digunakan untuk pembelajaran dan latihan yang menggunakan quiz-quiz menarik. Silahkan lakukan pendaftaran jika tidak memiliki akun. Jika sudah memiliki akun silahkan login!</p>
                    <p class="lead">
                        <a href="/login" class="btn btn-danger fs-5 fw-bold me-3 px-4 py-2">Login</a>
                        <a href="/register" class="btn color-yellow fs-5 fw-bold px-4 py-2 text-white">Daftar</a>
                    </p>
                </main>
            </div>
            <div class="col d-flex align-items-center justify-content-center">
                <img style="width: 400px;" src="{{ url('ill-edu.svg') }}" alt="">
            </div>
        </div>
        
        <footer class="text-center mt-5 pt-5 text-secondary">
            <p class="m-0">- Aplikasi ini untuk mendukung penelitian -</p>
            <p class="m-0">Arisnati Maulidania</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
    </html>
@endsection


