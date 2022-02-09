@extends('dashboard.layouts.main')
@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-sm-12">
              <h1 class="m-0">Halaman Produks</h1>
            </div><!-- /.col -->
        </div><!-- /.container-fluid -->
        <!-- /.card-header -->
        <div class="card-body">
        @if (session()->has('sukses'))
            <div class="alert alert-succes" role="alert">
                {{ session('sukses')}}
            </div>
          @endif
        <a href="/dashboard/produks/create" class="btn btn-primary mb-3">Tambah Produks</a>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Judul Produks</th>
              <th>Kategori</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
         @foreach ($produks as $produks):
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $produks->judul_produks }}</td>
              <td>{{ $produks->category->nama }}</td>
              <td>
                <a href="/dashboard/produks/{{ $produks->slug }}" class="btn btn-info"><i class="far fa-eye nav-icon"></i></a>
                <a href="/dashboard/produks/{{ $produks->slug }}/edit" class="btn btn-warning"><i class="far fa-edit nav-icon"></i></a>
                <form action="/dashboard/produks/{{ $produks->slug }}" method="POST" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('yakin akan menghapus data?')"><i class="nav-icon fas fa-trash-alt"></i></button>
                </form>
            </tr>
            @endforeach 
          </table>
        </div>
        <!-- /.card-body -->
      </div><!-- /.content-header -->
@endsection

