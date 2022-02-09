@extends('dashboard.layouts.main')
@section('container')
    <div class="card-body">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Produks</h3>
            </div>
            <form method="POST" action="/dashboard/produks" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
            <div class="form-group">
                <label for="judul_produks">Judul Produks</label>
                <input type="text" class="form-control @error ('judul_produks') is-invalid @enderror"
                id="judul_produks" name="judul_produks" placehonder="Judul Produks">
                @error('judul_produks')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>    
                @enderror
            </div>      
            <div class="form-group">
                <label for="slug">slug</label>
                <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug produks">
            </div>
            <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control @error ('harga') is-invalid @enderror"
                    id="harga" name="harga" placeholder="harga">
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            <div class="form-group">
                <label for="category_id">category</label>
                <select class="custom-select rounded-0" id="category_id" name="category_id"> 
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control @error ('foto') is-invalid @enderror"
                    id="foto" name="foto" placeholder="foto" accept="image/*">
                    @error('isi_produks')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
            </form>
        </div>
    </div>  
    <script>
        const judul_produks = document.querySelector('#judul_produks');
        const slug = document.querySelector('#slug');
        judul_produks.addEventListener('change', function(){
            fetch('/dashboard/produks/checkSlug?judul_produks='+judul_produks.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        })
        </script>
@endsection