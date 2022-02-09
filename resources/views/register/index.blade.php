@extends('layouts.main')
@section('content')
<div class="container mt-4">
<div class="row justify-content-center">
  <div class="col-lg-5">
    <main class="form-registration">
      <h1 class="h3 mb-3 fw-normal">Form Registrasi</h1>
      <form action="/register" method="POST">
        @csrf
        <div class="form-floating">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Nama</label>
          @error('name')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
          @enderror  
        </div>
        <div class="form-floating">
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Username</label>
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror  
        </div>
        <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email Address</label>
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
        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
      </form>
      <small class="d-block text-center mt-3">Already Registerd?<a href="/register">Login</a></small>
    </main>
  </div>
</div>
</div>
</form>
@endsection