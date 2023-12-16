@extends('layout/main')

@section('content')
    <div class="container mb-3 p-0">
        <div class="row">
            <div class="col">
                <h2>Mata Pelajaran</h2>
                <h5>Pendidikan Kewarganegaraan</h5>

                <a href="/material_detail/{{ $data->id }}" class="btn btn-primary my-3 me-2">Tambah Materi</a>
                <a href="/material_detail/edit/{{ $data->id }}" class="btn btn-outline-success my-3 me-2">Update Materi</a>

                @foreach ($data->material_detail as $item)
                    <form onsubmit="return confirm('Yakin mau hapus data?')" class="d-inline" action="/material_detail/{{ $item->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger" type="submit">Hapus Materi</button>
                    </form>
                @endforeach

            </div>
            <div class="col">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5>Bab {{ $data->bab }}</h5>
                            <h6>{{ $data->title }}</h6>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @foreach ($data->material_detail as $item)
                {!! $item->material_content !!}
            @endforeach
        </div>
    </div>

    <div class="mt-4"> 
        <h5>Quiz</h5>
        <a href="/quiz_special/{{ $data->id }}/1" class="btn btn-primary btn-lg my-3 me-2">Quiz Khusus</a>
        <a href="/quiz_general/{{ $data->id }}" class="btn btn-outline-success btn-lg my-3 me-2">Quiz Umum</a>
    </div>
@endsection