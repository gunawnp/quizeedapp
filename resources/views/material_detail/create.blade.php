@extends('layout/main')

@section('content')
    <div class="container mb-3 p-0">
        <div class="row">
            <div class="col">
                <h2>Mata Pelajaran</h2>
                <h5>Pendidikan Kewarganegaraan</h5>
            </div>
            <div class="col">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5>Bab {{ $data->id }}</h5>
                            <h6>{{ $data->title }}</h6>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="/material_detail" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="editor" class="form-label">
                        <h5>Isi Materi</h5>
                    </label>
                    <input type="hidden" name="id_ref" value="{{ $data->id }}">
                    <textarea name="content" class="form-control" id="editor" cols="5" rows="5"></textarea>
                </div>

                <div class="mb-3 d-grid mt-4">
                    <button class="btn btn-primary py-2" name="submit" type="submit">Post</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection