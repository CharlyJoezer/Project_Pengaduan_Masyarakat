<nav class="navbar-css ">
    <div class="position-absolute side-bar-toggle">
        <div style="cursor: pointer;">
          <span></span>
          <span></span>
          <span></span>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a href="/" style="margin: 0px;padding: 0px;text-decoration: none; color: #333;">
          <img src="/img/logobalikpapan.png" width="40" height="50" alt="">
        </a>

      <div class="side-img-logo">
          <h6>Balikpapan</h6>
          <small>Pengaduan Masyarakat</small>
      </div>
    </div>
    {{-- <div class="d-flex justify-content-center">
      <a class="text-decoration-none" style="color: green" href="/"><h1 style="margin: 0px;">Warpedia</h1></a>
    </div>
    <div class="d-flex justify-content-center">
      <small>Dashboard</small>
    </div> --}}

  </nav>
  <div class="side-bar p-3">
    <div class="side-bar-toggleback">
        <div style="cursor: pointer;">
          <span></span>
          <span></span>
          <span></span>
        </div>
    </div>
    
    <div class="side-bar-title mt-3">
      <p style="font-size: 14px; color: #bbb;margin: 0px;">Dashboard</p>
      <hr style="margin: 0px;">
    </div>
    <div class="side-bar-items mt-1">
      <a href="/dashboardHome" class="{{ Request::is('dashboardHome*') ? 'active' : '' }}"><i class="bi bi-house-door"></i> Home</a>
    </div>

    <div class="side-bar-title">
      <p style="font-size: 14px; color: #bbb;margin: 0px;">Laporan</p>
      <hr style="margin: 0px;">
    </div>
    <div class="side-bar-items mt-1">
      @if (session()->has('adminlogin'))
        <a href="/dashboardLaporan" class="{{ Request::is('dashboardLaporan*') ? 'active' : '' }}"><i class="bi bi-clipboard2"></i> Daftar Laporan</a>
        <a href="/registerpetugas" class="{{ Request::is('registerpetugas*') ? 'active' : '' }}"><i class="bi bi-file-person"></i> Akun Petugas</a>
      @endif
      
      @if (session()->has('userlogin'))
        <a href="/dashboardRiwayatLaporan" class="{{ Request::is('dashboardRiwayatLaporan*') ? 'active' : '' }}"><i class="bi bi-clock-history"></i> Riwayat Laporan</a>
        <a href="/dashboardbuatlaporan" class="{{ Request::is('dashboardbuatlaporan*') ? 'active' : '' }}"><i class="bi bi-clipboard-plus"></i> Buat Laporan</a>
      @endif
    </div>

  </div>

  <script>
      const toggle = document.querySelector('.side-bar-toggle')
      const sideBar = document.querySelector('.side-bar')

      toggle.addEventListener('click', function(){
        sideBar.classList.toggle('slide') 
      });

      const sidebarBack = document.querySelector('.side-bar-toggleback')
      sidebarBack.addEventListener('click', function(){
        sideBar.classList.toggle('slide') 
      });
  </script>