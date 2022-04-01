{{-- @dd($laporan[1]->tanggapan->tanggapan --}}
@extends('dashboard.layout.template')
@section('container')
    <h3 class="mt-3">Daftar Laporan</h3>
    <hr>
    <div class="d-flex ">
      <button class="btn btn-success my-2 print-button" onclick="window.print()"><i class="bi bi-printer"></i> Print</button>
    
    {{-- FILTER --}}
    <div class="dropdown my-2 filter-button" style="margin-left: 3px;">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Filter <i class="bi bi-funnel"></i>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding: 0px;">
        <li style="border-bottom: 1px solid grey"><a class="dropdown-item @if(Request::is("dashboardLaporan")) bg-dark @endif" href="/dashboardLaporan"><i class="bi bi-clipboard2"></i> Semua Laporan</a></li>
        <li><a class="dropdown-item @if(Request::is("dashboardLaporan/0")) bg-dark text-white @endif" href="/dashboardLaporan/{{ '0' }}" style="color: rgb(100, 100, 100)"></i><i class="bi bi-clock-history"></i> Sedang verifikasi </a></li>
        <li><a class="dropdown-item @if(Request::is("dashboardLaporan/proses")) bg-dark @endif" href="/dashboardLaporan/{{ 'proses' }}" style="color: rgba(255, 208, 0, 0.986);"><i class="bi bi-arrow-clockwise"></i> Sedang diproses </a></li>
        <li><a class="dropdown-item @if(Request::is("dashboardLaporan/selesai")) bg-dark @endif" href="/dashboardLaporan/{{ 'selesai' }}" style="color: green;"><i class="bi bi-check2"></i> Selesai</a></li>
      </ul>
    </div>
    </div>
    
    <table class="table table-bordered data-laporan" border="1px" style="margin-bottom: 100px;">
        <thead class="table-dark">
          <tr>
            <th scope="col">Tanggal</th>
            <th scope="col">Photo</th>
            <th scope="col">NIK</th>
            <th scope="col">Isi Laporan</th>
            <th scope="col">Set Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach($laporan as $item)
            @if ($item->status == $filter)
              <tr>
                <th class="align-middle" scope="row">{{ $item->created_at }}</th>
                <td class="align-middle"><img class="img-fluid" src="/storage/{{ $item->photo }}" width="150" height="100"></td>
                <td class="align-middle">{{ $item->nik }}</td>
                <td class="align-middle">{{ $item->isi_laporan }}</td>
                <td class="align-middle"> 
                  
                  @if ($item->status == '0')
                  <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      Verifikasi
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" style="color: rgba(255, 208, 0, 0.986);" href="/setproses/{{ $item->id_pengaduan }}"><i class="bi bi-arrow-clockwise"></i> Proses</a></li>
                      <li><a class="dropdown-item" style="color: red;"  href="#"><i class="bi bi-x-lg"></i> Gagal Verifikasi</a></li>
                    </ul>
                  </div>
                  @elseif($item->status == 'proses')
                  <div class="btn-group">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      Proses
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" style="color: green;" href="/setselesai/{{ $item->id_pengaduan }}"><i class="bi bi-check2"></i> Selesai</a></li>
                    </ul>
                  </div>
                  @elseif($item->status == 'selesai')
                  <div class="btn-group mb-2">
                    <button type="button" class="btn btn-success">
                      Selesai
                    </button>
                  </div>
                </td>
                @endif
              </tr>
            @endif
            @endforeach
        </tbody>
      </table>
      <script>
        const notiflogin = document.querySelector('.notif-login')
      
        if(notiflogin){
          setTimeout(() => {
           notiflogin.style.display = "none"
         }, 3000);
        }
      </script>
@endsection
