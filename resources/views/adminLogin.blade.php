@extends('layout.template')
@section('container')
<div class="login-title d-flex justify-content-center pt-4">
    <h4 class="primary">ADMIN</h4>
</div>

<div class="box-login">
    @if (session()->has('fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('fail') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <form action="/storeDataAdmin" method="post">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="{{ old('username') }}">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
        <small class="d-block text-center mt-3">Login Sebagai Masyarakat ? <a href="/login" class="text-decoration-none">Login</a></small>
    </form>
</div>
@endsection