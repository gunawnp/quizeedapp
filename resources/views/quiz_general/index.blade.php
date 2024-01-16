@extends('layout/main')

@section('content')
    <div class="row mt-3">
        <div class="card p-4">
            <div class="text-center">
                <form action="/quiz_general/{{ $m_id }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_ref" value="{{ $m_id }}">
                    <button class="btn btn-danger text-end btn-lg" type="submit">+ Tambah</button>
                </form>
            </div>
            
            @if (isset($data))
                @foreach ($data as $item)
                    <div class="d-flex justify-content-between mx-auto mt-4">
                        <a href="/quiz_general/{{ $m_id }}/{{ $item->id }}" class="btn btn-outline-warning btn-lg py-3 me-4" style="width: 500px">Stage {{ $item->id }}</a>
                        <form onsubmit="return confirm('Yakin mau hapus data?')" action="/quiz_general/{{ $m_id }}/{{ $item->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-lg mt-2" type="submit">+ Hapus</button>
                        </form>
                    </div>
                @endforeach
            @else
                <h4 class="text-center mt-4">- Kosong -</h4>
            @endif
        </div>
    </div>
@endsection