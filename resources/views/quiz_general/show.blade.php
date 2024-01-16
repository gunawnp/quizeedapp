@extends('layout/main')

@section('content')
    
    <div class="row mb-2">
        <div class="col-8">
            <h2>Bab {{ $data->id }}</h2>
            <h5>{{ $data->title }}</h5>
        </div>

        <div class="col-4 mt-5">
            <button class="btn btn-danger me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Tambah Soal</button>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body m-0">
                    @if ($dataQGD != null)
                        <div class="row">
                            <div class="col">
                                <h6 class="m-0">Soal No. {{ $dataQGD->number }}</h6>
                                <p>{{ $dataQGD->question_text }}</p>
                            </div>
                            <div class="col d-grid d-sm-flex justify-content-md-end ">
                                <div>
                                    <form onsubmit="return confirm('Yakin mau hapus data?')" class="" action="/quiz_general_detail/{{  $dataQGD->quiz_general_id }}/{{ $dataQGD->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <form>
                            <div class="form-check mb-3">
                                <input class="form-check-input" value="a" type="radio" name="option" id="option_a" checked>
                                <label class="form-check-label" for="option_a">
                                    a. {{ $dataQGD->option_a }}
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" value="b" type="radio" name="option" id="option_b">
                                <label class="form-check-label" for="option_b">
                                    b. {{ $dataQGD->option_b }}
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" value="c" type="radio" name="option" id="option_c">
                                <label class="form-check-label" for="option_c">
                                    c. {{ $dataQGD->option_c }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="d" type="radio" name="option" id="option_d">
                                <label class="form-check-label" for="option_d">
                                    d. {{ $dataQGD->option_d }}
                                </label>
                            </div>
                        </form>
                    @else
                        <p>- Data Kosong -</p>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h6>Nomor Soal</h6>
                    @if (isset($data->quiz_general_detail))
                        @foreach ($data->quiz_general_detail as $item)
                            <a href="/quiz_general/{{$item->quiz_general_id}}/{{ $item->id }}" class="btn btn-outline-dark me-3 mt-3"> {{ $item->number }} </a>
                        @endforeach
                    @else
                        <p>- Data Kosong -</p>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>    

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Soal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="/quiz_general_detail" method="POST">
                @csrf
                <input type="hidden" name="id_ref" value="{{ $data->id }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="number" class="form-label">Nomor</label>
                        <input type="text" name="number" class="form-control" id="number" rows="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="question_text" class="form-label">Soal</label>
                        <textarea name="question_text" class="form-control" id="question_text" rows="1" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="option_a" class="form-label">Option A</label>
                        <textarea name="option_a" class="form-control" id="option_a" rows="1" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="option_b" class="form-label">Option B</label>
                        <textarea name="option_b" class="form-control" id="option_b" rows="1" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="option_c" class="form-label">Option C</label>
                        <textarea name="option_c" class="form-control" id="option_c" rows="1" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="option_d" class="form-label">Option D</label>
                        <textarea name="option_d" class="form-control" id="option_d" rows="1" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="answer" class="form-label">Answer</label>
                        <input type="text" name="answer" class="form-control" id="answer" rows="1" required>
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