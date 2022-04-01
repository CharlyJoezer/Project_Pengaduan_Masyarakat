@extends('dashboard.layout.template')
@section('container')

      @if(session()->has('berhasilregis'))
      <div class="notif-login alert-success" data-aos="fade-down">
        <div class="text-center">
          <strong>{{ session('berhasilregis') }}</strong>
        </div>
      </div>
      @endif

<div class="row mt-3">
    <div class="col-lg-12 d-flex justify-content-center mb-2">
        <h4>Buat Akun Petugas</h4>
    </div>
    <hr style="width: 80%;margin: auto;">
</div>

<div class="box-register mt-3">
        <form action="/storeDataRegis" method="post">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" aria-describedby="basic-addon1">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-badge"></i></span>
                <input type="text" class="form-control @error('nama_petugas') is-invalid @enderror" name="nama_petugas" placeholder="Nama Petugas" aria-describedby="basic-addon1">
                @error('nama_petugas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
             </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" aria-describedby="basic-addon1">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                <input type="number" class="form-control @error('telp') is-invalid @enderror" name="telp" placeholder="No. Telpon"  aria-describedby="basic-addon1">
                @error('telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              
              <small>Akun Sebagai : </small>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="level" value="admin" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  Admin
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="level" value="petugas" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                  Petugas
                </label>
              </div>
              

              <button type="submit" class="btn btn-primary w-100 mt-2">Buat akun</button>
        </form>
</div>
<script>
    const notiflogin = document.querySelector('.notif-login')
  
    if(notiflogin){
      setTimeout(() => {
       notiflogin.style.display = "none"
     }, 3000);
    }
  </script>
@endsection