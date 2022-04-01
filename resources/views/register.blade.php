@extends('layout.template')

@section('container')

    <div class="login-title d-flex justify-content-center pt-3">
        <h4 class="primary">Register</h4>
    </div>

    <div class="box-register">
        <form action="/storeDataRegister" method="post">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-badge"></i></span>
                <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" placeholder="NIK" aria-label="nik" aria-describedby="basic-addon1" value="{{ old('nik') }}">
                @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" aria-label="nama" aria-describedby="basic-addon1" value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
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

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                <input type="number" class="form-control @error('telp') is-invalid @enderror" name="telp" placeholder="No. Telpon" aria-label="telp" aria-describedby="basic-addon1" value="{{ old('telp') }}">
                @error('telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <button type="submit" class="btn btn-success w-100">Register</button>
            <small class="d-block text-center mt-3">Sudah Registrasi ?, Silahkan <a href="/login" class="text-decoration-none">Login</a></small>
        </form>
    </div>
@endsection