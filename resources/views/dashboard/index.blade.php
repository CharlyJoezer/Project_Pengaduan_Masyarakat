@extends('dashboard.layout.template')
@section('container')

      @if(session()->has('successLogin'))
      <div class="notif-login alert-success" data-aos="fade-down">
        <div class="text-center">
          <strong>{{ session('successLogin') }}</strong>
        </div>
      </div>
      @endif

<div class="home-box d-flex justify-content-center mt-4 mb-5">
    <div class="card" style="width: 18rem;">
        <img src="/img/fotoprofil.png" class="card-img-top img-fluid" alt="...">
        <div class="card-body">
          @if (session()->has('adminlogin'))
          <h5 class="card-title">Nama : {{ $adminlogin->nama_petugas }}</h5>
          @else
          <h5 class="card-title">Nama : {{ $userlogin->nama }}</h5>
          @endif
          @if (session()->has('adminlogin'))
          <p class="card-text">Kamu Login Sebagai <strong>ADMIN</strong></p>
          @else
          <p class="card-text">Kamu Login Sebagai <strong>USER</strong></p>
          @endif
          @if (session()->has('adminlogin'))
          <a href="/logoutAdmin" class="btn btn-primary">Logout</a>
          @else
          <a href="/logout" class="btn btn-primary">Logout</a>
          @endif
        </div>
      </div>
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