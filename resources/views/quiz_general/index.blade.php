@extends('layout/main')

@section('content')
    <div class="row mt-3">
        <div class="card p-4">
            <h3 class="text-center">Quiz Umum</h3>
            @if (Auth::user()->roleId == 1)
                <div class="text-center">
                    <form action="/quiz_general/{{ $m_id }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_ref" value="{{ $m_id }}">
                        <button class="btn btn-danger text-end btn-lg mt-3" type="submit">+ Tambah</button>
                    </form>
                </div>
            @endif

            @if (isset($data))
                @foreach ($data as $item)
                    <div class="d-flex justify-content-between mx-auto mt-4">
                        @if (Auth::user()->roleId == 1)
                            <a href="/quiz_general/{{ $m_id }}/{{ $item->id }}/1" class="btn btn-outline-warning btn-lg py-3 me-4" style="width: 500px">Stage {{ $loop->index+1 }}</a>
                            <form onsubmit="return confirm('Yakin mau hapus data?')" action="/quiz_general/{{ $m_id }}/{{ $item->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-lg mt-2" type="submit">+ Hapus</button>
                            </form>
                        @else
                            <a href="/quiz_general_user/{{ $m_id }}/{{ $item->id }}/1" class="btn btn-outline-warning btn-lg py-3 me-4" style="width: 500px">Stage {{ $loop->index+1 }}</a>
                        @endif    
                    </div>
                @endforeach
            @else
                <h4 class="text-center mt-4">- Kosong -</h4>
            @endif
        </div>
    </div>
@endsection