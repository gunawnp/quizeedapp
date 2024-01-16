@extends('layout/main')

@section('content')
    <div class="container mb-3">
        <div class="row">
            <div class="col">
                <h2>Mata Pelajaran</h2>
                <h5>Pendidikan Kewarganegaraan</h5>
            </div>
            <div class="col">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                    <a href="/material" class="btn btn-danger me-md-2" type="button">< Kembali</a>
                </div>   
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($data as $item)
            <div class="col">
                <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Bab {{ $item->bab }}</h5>
                    <p class="card-text">{{ $item->title }}</p>
                    <form onsubmit="return confirm('Yakin mau hapus data?')" action="/material/{{ $item->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger text-end" type="submit">Hapus</button>
                    </form>
                </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection