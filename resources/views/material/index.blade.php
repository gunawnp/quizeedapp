@extends('layout/main')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col">
                <h2>Mata Pelajaran</h2>
                <h5>Pendidikan Kewarganegaraan</h5>
            </div>
            <div class="col">
                @if (Auth::user()->roleId == 1)
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <button class="btn btn-danger me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Tambah</button>
                        <a href="/material_delete" class="btn btn-outline-danger">- Hapus</a>
                    </div>    
                @endif
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
                    <a href="/material/{{ $item->id }}" class="stretched-link"></a>
                </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/material" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="bab" class="form-label">Bab Berapa</label>
                    <input name="bab" type="text" class="form-control" id="bab" required>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Bab</label>
                    <textarea name="title" class="form-control" id="title" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Simpan</button>
            </div>
        </form>
        </div>
    </div>
    </div>
@endsection