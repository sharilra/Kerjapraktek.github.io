@extends('dashboard.layouts.main')
@section('container')
        <div class="card-body">
                <div class="card card-primary">
                    <div class="card card-header"> 
                  <h3 class="card-title">Edit Produk</h3>
                    </div>
                    <form method="POST" action="/dashboard/produks/{{ $produks->slug }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="judul_produks">Judul Produk</label>
                                <input type="text" class="form-control @error ('judul_produks') id-invalid @enderror"
                                id="judul_produks" name="judul_produks" placeholder="Judul Produks" value="{{ old('judul_produks', $produks->judul_produks) }}">
                                @error('judul_produks')
                                   <div class="invalid-feedback">
                                       {{ $message }}
                                   </div>
                                   @enderror
                            </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="slug Produks" value="{{ old('slug', $produks->slug) }}">
                                </div>
                                <div class="form-group">
                                <label for="harga">Judul Produk</label>
                                <input type="text" class="form-control @error ('harga') id-invalid @enderror"
                                id="harga" name="harga" placeholder="Judul Produks" value="{{ old('harga', $produks->harga) }}">
                                @error('harga')
                                   <div class="invalid-feedback">
                                       {{ $message }}
                                   </div>
                                   @enderror
                            </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="custom-select rounded-0" id="category_id" name="category_id">
                                    @foreach ($categories as $category)
                                    @if (old('category_id', $produks->category_id)==$category->id)
                                         <option value="{{ $category->id}}" selected>{{ $category->nama }}</option>
                                    @else
                                         <option value="{{ $category->id }}">{{ $category->nama }}</option>   
                                    @endif
                                    @endforeach
                                    </select>
                                </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="hidden" name="oldImage" value="{{ $produks->foto }}">
                            <input type="file" class="form-control @error ('foto') is-invalid @enderror"
                            id="foto" name="foto" placeholder="foto" accept="image/*">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Produks</button>
                        </div>
                    </form>
                </div>
                <script>
                    const judul_produks = document.querySelector('#judul_Produks');
                    const slug = document.querySelector('#slug');
                    judul_produks.addEventListener('change', function(){
                        fetch('/dashboard/produks/checkSlug?judul_produks='+judul_produks.value)
                        .then(response =>response.json())
                        .then(data => slug.value = data.slug)
                    })
                </script>
@endsection