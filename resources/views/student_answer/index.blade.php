@extends('layout/main')

@section('content')
    <div class="row flex justify-content-center">
        <div class="col-10 mt-5">
            <div class="card">
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <h3 class="text-center mb-3 mt-4">Daftar Jawaban</h3>
                    </div>
                    <div class="col d-flex justify-content-end align-items-center me-5">
                        <div>
                            <a href="/quiz_special/{{ $m_id }}/1" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body m-0 px-5">
                    <table class="table table-bordered table-striped table-hover border-danger">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->isEmpty())
                                <tr>
                                    <td colspan="3" class="text-center"> - </td>
                                </tr>
                            @else
                                @foreach ($data as $d)
                                    <tr>
                                        <th scope="row">{{ $loop->index+1 }}</th>
                                        <td>{{ $d->user_name }}</td>
                                        <td>{{ $d->score }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
@endsection