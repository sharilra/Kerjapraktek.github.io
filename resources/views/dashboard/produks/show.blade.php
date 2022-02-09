@extends('dashboard.layouts.main')
@section('container')
    <div class="content-header">
        <div class="card-body">
            <article>
                <h4 clas="mb-3">{{ $produks->judul_produks }} </h4><hr style="backgraound-color: white">
                <p>{!! $produks->isi_produks !!}</p>
                <a href="/dashboard/produks" class="btn btn-success">Kembali Ke Produks Utama</a>
                <a href="/dashboard/produks/{{ $produks->slug }}/edit" class="btn btn-warning">Edit</a>
                <form action="/dashboard/produks/{{ $produks->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('yakin akan menghapus data?)'">Hapus</button>
                </form>
            </article>
        </div>
    </div>
@endsection