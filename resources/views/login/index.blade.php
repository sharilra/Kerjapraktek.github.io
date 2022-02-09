@extends('layouts.main')
@section('content')
<div class="container mt-4">
<div class="row justify-content-center">
  <div class="col-lg-4">
    @if (session()->has('sukses'))
    <div class="alert alert-succes alert-dismissible fade show" role="alert">
      {{ session('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>    
    @endif

    @if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button typpe="buttom" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <main class="form-signin">
      <h1 class="h3 mb-3 fw-normal">Form Login</h1>
      <form action="/login" method="POST">
        @csrf
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
          @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror  
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control rounded-buttom @error('password') is-invalid @enderror" id="password" placeholder="Password">
          <label for="password">Password</label>
          @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror  
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      </form>
      <small class="d-block text-center mt-3">Belum Registrasi?<a href="/register">Registrasi Sekarang!</a></small>
    </main>
  </div>
</div>
</div>
</form>
@endsection