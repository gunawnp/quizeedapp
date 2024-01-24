@extends('layout/main')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <h2>Bab {{ $dataM->bab }}</h2>
            <h2>{{ $dataM->title }}</h2>
            <h5>Quiz Umum - {{ $dataM->bab }}</h5>
            <div class="card">
                <div class="card-body m-0">
                    @if ($dataSA != null && $dataSA->user_name == Auth::user()->name)
                        <div class="text-center">
                            <h2>Quiz ini sudah selesai dengan nilai</h2>
                            <h1>{{ $dataSA->score }}</h1>
                        </div>
                    @else
                        @if ($dataQGD != null)
                            <form action="/quiz_general_user_detail" method="POST">
                                @csrf
                                <input type="hidden" name="m_id" value="{{ $dataM->id }}">
                                <input type="hidden" name="qg_id" value="{{ $data->id }}">
                                @foreach ($dataQGD as $q)
                                    <div class="mb-3">
                                        <div class="row">
                                            <h6 class="m-0">Soal No. {{ $q->number }}</h6>
                                            <p>{{ $q->question_text }}</p>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" value="a" type="radio" name="option-{{ $q->number }}" id="option_a_{{ $q->number }}" checked>
                                            <label class="form-check-label" for="option_a_{{ $q->number }}">
                                                a. {{ $q->option_a }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" value="b" type="radio" name="option-{{ $q->number }}" id="option_b_{{ $q->number }}">
                                            <label class="form-check-label" for="option_b_{{ $q->number }}">
                                                b. {{ $q->option_b }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" value="c" type="radio" name="option-{{ $q->number }}" id="option_c_{{ $q->number }}">
                                            <label class="form-check-label" for="option_c_{{ $q->number }}">
                                                c. {{ $q->option_c }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="d" type="radio" name="option-{{ $q->number }}" id="option_d_{{ $q->number }}">
                                            <label class="form-check-label" for="option_d_{{ $q->number }}">
                                                d. {{ $q->option_d }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach

                                @if (!$dataQGD->isEmpty())
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-warning btn-lg px-5" value="Submit">
                                    </div>
                                @endif
                            </form>
                        @else
                            <p>- Data Kosong -</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>    
@endsection