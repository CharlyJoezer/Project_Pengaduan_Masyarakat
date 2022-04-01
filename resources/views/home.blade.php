{{-- @dd($total)
@dd($proses)
@dd($selesai) --}}
@extends('layout.template')
@section('container')

@if(session()->has('successLogin'))
<div class="notif-login alert-success" data-aos="fade-down">
  <div class="text-center">
    <strong>{{ session('successLogin') }}</strong>
  </div>
</div>
@endif

@if(session()->has('successLogout'))
<div class="notif-login alert-success" data-aos="fade-down">
  <div class="text-center">
    <strong>{{ session('successLogout') }}</strong>
  </div>
</div>
@endif

@if(session()->has('laporandibuat'))
<div class="notif-login alert-success" data-aos="fade-down">
  <div class="text-center">
    <strong>{{ session('laporandibuat') }}</strong>
  </div>
</div>
@endif

<div class="d-flex justify-content-center">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" style="border-radius: 10px;">
          {{-- https://source.unsplash.com/1200x400/?chill --}}
          <div class="carousel-item active" >
            <img src="/img/carousel1.jpg" class="d-block w-100"  alt="...">
          </div>
          <div class="carousel-item">
            <img src="/img/carousel2.jpg" class="d-block w-100"  alt="...">
          </div>
          <div class="carousel-item">
            <img src="/img/carousel3.jpg" class="d-block w-100"  alt="...">
          </div>
        </div>
    </div>
</div>
<div id="about"></div>

<div class="d-flex justify-content-center mt-4" >
    <h4>About</h4>
</div>
<hr>

<div class="space-row-about">
    <div class=" bg-danger info-box shadow mb-3">
        <h3 style="color: white;">Total Laporan</h3>
        <h3 style="color: white;">{{ $total }}</h3>
    </div>
    <div class="bg-warning info-box shadow mb-3">
        <h3 style="color: white;">Laporan Diproses</h3>
        <h3 style="color: white;">{{ $proses }}</h3>
    </div>
    <div class="bg-success info-box shadow mb-3">
        <h3 style="color: white;">Laporan Selesai</h3>
        <h3 style="color: white;">{{ $selesai }}</h3>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    <h4>Buat Laporan</h4>
</div>
<hr>
<div class="space-row" id="buatlaporan">
    @if(session()->has('userlogin'))
    <form action="/mengirimDataPengaduan" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          {{-- <label for="nik" class="form-label">NIK</label> --}}
          <input type="hidden" class="form-control" name="nik" id="nik" aria-describedby="emailHelp" value="{{ $userlogin->nik }}">
        </div>
        <div class="mb-3">
          <label for="isilaporan" class="form-label">Isi Laporan</label>
          <textarea class="form-control" name="isi_laporan" id="isilaporan" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Foto/Bukti</label>
            <input class="form-control" name="photo" type="file" id="formFile">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Kirim Laporan</button>
      </form>
      @elseif(session()->has('adminlogin'))
      <div class="d-flex justify-content-center mt-3">
        <div class="card shadow w-50">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <h5 style="margin: 0px;">FORM INI HANYA UNTUK MASYARAKAT</h5>
                </div>
            </div>
          </div>
      </div>
      @else
      <div class="d-flex justify-content-center mt-3">
        <div class="card shadow">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <h5>Silahkan Login</h5>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="/login" class="btn btn-primary">Login</a>
                </div>
            </div>
          </div>
      </div>
      @endif
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